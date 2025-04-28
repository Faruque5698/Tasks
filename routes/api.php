<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TaskController;

Route::post('register',[UserController::class, 'store'])->name('api.register');

//blog
Route::get('posts',[BlogController::class, 'index'])->name('api.posts.list');
Route::post('posts',[BlogController::class, 'store'])->name('api.posts.store');
Route::get('posts/{id}',[BlogController::class, 'show'])->name('api.posts.show');

//task
Route::get('tasks',[TaskController::class, 'index'])->name('api.tasks.list');
Route::post('tasks',[TaskController::class, 'store'])->name('api.tasks.store');
Route::patch('tasks/{id}',[TaskController::class, 'isCompletedUpdate'])->name('api.tasks.is_completed.update');
