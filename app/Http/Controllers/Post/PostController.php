<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->where('user_id', auth()->user()->id)->get();
        return view('dashboard.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $request->validate([
        'title' => ['required', 'min:5', 'max:256'],
        'short_desc' => ['required', 'min:30', 'max:512'],
        'content' => ['required', 'min:64']
       ]);

       $coverPhoto = null;

       if($request->hasFile('cover_picture')) {
            $request->cover_picture->store('public/cover_pictures');
            $coverPhoto = 'cover_pictures/' . $request->cover_picture->hashName();

       }


       Post::create([
            'title' =>$request->title,
            'slug' => Str::slug($request->title, '-'),
            'short_desc' => $request->short_desc,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'picture' => $coverPhoto,
       ]);

    

       return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('blog.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if($post->user->id != auth()->user()->id && !auth()->user()->is_admin) {
            return to_route('dashboard');
        }
        return view('dashboard.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        if($post->user->id != auth()->user()->id && !auth()->user()->is_admin) {
            return to_route('dashboard');
        }

        $request->validate([
            'title' => ['required', 'min:5', 'max:256'],
            'short_desc' => ['required', 'min:30', 'max:512'],
            'content' => ['required', 'min:64']
           ]);

        $coverPhoto = $post->picture;

        if($request->hasFile('cover_picture')) {
            $request->cover_picture->store('public/cover_pictures');
            $coverPhoto = 'cover_pictures/' . $request->cover_picture->hashName();
        }

       $post->update([
        'title' =>$request->title,
        'slug' => Str::slug($request->title, '-'),
        'short_desc' => $request->short_desc,
        'content' => $request->content,
        'picture' => $coverPhoto,
    ]);

    return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index');
    }
}
