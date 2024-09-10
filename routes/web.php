<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';


Route::get('/', [FeedController::class, 'index'])->name('feed');

Route::get('/category/{name}', [FeedController::class, 'feedcategory'])->name('category');

Route::group(['prefix' => 'feeds', 'as' => 'feeds.'], function () {
    Route::get('', [PostController::class, 'index'])->name('index');

    Route::post('', [PostController::class, 'store'])->name('store');

    Route::get('/{feed}', [PostController::class, 'show'])->name('show');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/{feed}/edit', [PostController::class, 'edit'])->name('edit');

        Route::put('/{feed}', [PostController::class, 'update'])->name('update');

        Route::delete('/{feed}', [PostController::class, 'destroy'])->name('destroy');

        Route::post('/{feed}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});

Route::get('/terms', function () {
    return view('terms');
});
