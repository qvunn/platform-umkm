<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FeedController::class, 'index'])->name('feed');

Route::get('/category/{name}', [FeedController::class, 'feedcategory'])->name('category');

Route::get('/feeds', [PostController::class, 'index'])->name('feeds.index');

Route::get('/feeds/{feed}', [PostController::class, 'show'])->name('feeds.show');

Route::get('/feeds/{feed}/edit', [PostController::class, 'edit'])->name('feeds.edit');

Route::put('/feeds/{feed}', [PostController::class, 'update'])->name('feeds.update');

Route::post('/feeds', [PostController::class, 'store'])->name('feeds.store');

Route::delete('/feeds/{feed}', [PostController::class, 'destroy'])->name('feeds.destroy');

Route::get('/terms', function () {
    return view('terms');
});
