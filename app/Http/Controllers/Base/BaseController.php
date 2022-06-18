<?php

namespace App\Http\Controllers\Base;

use App\Models\Post;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class BaseController extends Controller
{
    public function index() {

        $posts = Post::orderBy('created_at', 'ASC')->paginate(4);
        return view('blog.index', compact('posts'));
    }

    public function about() {
        return view('blog.about');
    }

    public function contact() {
        return view('blog.contact');
    }

    public function sendMessage(ContactRequest $request) {
        Mail::to('my@mail.com')->send(new ContactMail($request->name, $request->email, $request->phone, $request->message));
        return to_route('base.index');
    }
}
