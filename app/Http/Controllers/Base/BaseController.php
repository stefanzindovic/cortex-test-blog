<?php

namespace App\Http\Controllers\Base;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
