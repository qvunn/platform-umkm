<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FeedController::class, 'index'])->name('feed');

Route::get('/category/{name}', [FeedController::class, 'feedcategory'])->name('category');

Route::get('/feeds', [PostController::class, 'index'])->name('feeds.index');

Route::get('/feeds/{feed}', [PostController::class, 'show'])->name('feeds.show');

Route::get('/feeds/{feed}/edit', [PostController::class, 'edit'])->name('feeds.edit')->middleware('auth');

Route::put('/feeds/{feed}', [PostController::class, 'update'])->name('feeds.update')->middleware('auth');

Route::post('/feeds', [PostController::class, 'store'])->name('feeds.store')->middleware('auth');

Route::delete('/feeds/{feed}', [PostController::class, 'destroy'])->name('feeds.destroy')->middleware('auth');

Route::post('/feeds/{feed}/comments', [CommentController::class, 'store'])->name('feeds.comments.store')->middleware('auth');


Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/terms', function () {
    return view('terms');
});
