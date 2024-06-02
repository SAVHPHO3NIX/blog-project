<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'posts/','as'=>'posts.'], function(){

    Route::get('/{id}', [PostController::class,'show'])->name('show');


    Route::group(['middleware' => ['auth']], function(){

        Route::post('', [PostController::class,'store'])->name('create');

        Route::get('/{id}/edit', [PostController::class,'edit'])->name('edit');

        Route::put('/{id}', [PostController::class,'update'])->name('update');

        Route::delete('/{id}', [PostController::class,'destroy'])->name('destroy');

        Route::post('/{id}/comments', [CommentController::class,'store'])->name('comments.store');

    });
});

Route::get('/register', [AuthController::class,'register'])->name('register');

Route::post('/register', [AuthController::class,'store']);

Route::get('/login', [AuthController::class,'login'])->name('login');

Route::post('/login', [AuthController::class,'authenticate']);

Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::resource('users', \App\Http\Controllers\UserController::class)->only(['show', 'edit', 'update'])->middleware('auth');

Route::get('profile', [App\Http\Controllers\UserController::class, 'profile'])->middleware('auth')->name('profile');


Route::post('users/{user}/follow',[FollowerController::class,'follow'])->middleware('auth')->name('users.follow');

Route::post('users/{user}/unfollow',[FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');

Route::get('/terms', function () {
    return view('terms');
});
