<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index() {
        return view('blog.index');
    }

    public function about() {
        return view('blog.about');
    }

    public function contact() {
        return view('blog.contact');
    }
}
