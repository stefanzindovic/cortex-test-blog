<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index() {
        $blogCount = count(Post::all());
        $userCount = count(User::all());
        return view('admin.index', compact('userCount', 'blogCount'));
    }

    public function posts() {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('admin.posts', compact('posts'));
    }

    public function users() {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('admin.users', compact('users'));
    }
}
