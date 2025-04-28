<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;

Route::post('register',[UserController::class, 'store'])->name('api.register');

//blog
Route::get('posts',[BlogController::class, 'index'])->name('api.posts.list');
Route::post('posts',[BlogController::class, 'store'])->name('api.posts.store');
Route::get('posts/{id}',[BlogController::class, 'show'])->name('api.posts.show');

