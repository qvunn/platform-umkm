<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';


// # Main conroller
Route::get('/', [FeedController::class, 'index'])->name('feed');
Route::get('/category/{name}', [FeedController::class, 'feedcategory'])->name('category');

// # Feed controller
Route::resource('feeds', PostController::class)->except(['create', 'show'])->middleware('auth');
Route::resource('feeds', PostController::class)->only(['show']);

// # Comment controller
Route::resource('feeds.comments', CommentController::class)->only('store')->middleware('auth');

Route::get('/terms', function () {
    return view('terms');
});
