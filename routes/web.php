<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;

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

Route::get('/test', function () {
    return view('dashboard.index');
});

Route::name('base.')->group(function() {
    Route::get('/', [BaseController::class, 'index'])->name('index');
    Route::get('/about', [BaseController::class, 'about'])->name('about');
    Route::get('/contact', [BaseController::class, 'contact'])->name('contact');
    Route::post('/contact', [BaseController::class, 'sendMessage'])->name('send_mail');
});

Route::get('/control', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('adminn')->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/posts', [AdminController::class, 'posts'])->name('posts');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
});

Route::resource('posts', PostController::class)->parameter('posts', 'post:slug');

Route::prefix('users')->name('users.')->group(function() {
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::patch('/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
