<?php

use App\Http\Controllers\Base\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('blog.index');
});

Route::name('base.')->group(function() {
    Route::get('/', [BaseController::class, 'index'])->name('index');
    Route::get('/about', [BaseController::class, 'about'])->name('about');
    Route::get('/contact', [BaseController::class, 'contact'])->name('contact');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
