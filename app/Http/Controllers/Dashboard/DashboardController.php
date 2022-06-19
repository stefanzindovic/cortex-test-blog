<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $posts = Post::where('user_id', auth()->user()->id)->get();
        $count = count($posts);
        return view('dashboard.index', compact('count'));
    }
}
