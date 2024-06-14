<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class,'index'])->name('dashboard');

Route::get('/post', [PostController::class,'index'])->name('post');

Route::get('/category/{name}', [DashboardController::class,'feedcategory'])->name('category');

Route::post('/stories', [PostController::class,'store'])->name('stories.store');

Route::delete('/stories/{id}', [PostController::class,'destroy'])->name('stories.destroy');

Route::get('/terms', function(){
    return view('terms');
});