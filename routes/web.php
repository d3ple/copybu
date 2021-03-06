<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;


Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth')->name('posts.create');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/my', [PostController::class, 'showOwnPosts']);
Route::get('/posts/{post:id}', [PostController::class, 'show']);
Route::patch('/posts/{post:id}', [PostController::class, 'update']);
Route::post('/posts/{post:id}/like', [PostController::class, 'like']);

Route::patch('/user/{user:id}', [UserController::class, 'update']);

Route::redirect('/tags', '/');
Route::post('/tags/search', [TagController::class, 'searchPosts']);
Route::get('/tags/{ids}', [TagController::class, 'showPosts']);

Route::get('/communities/create', [CommunityController::class, 'create'])->middleware('auth')->name('communities.create');
Route::post('/communities', [CommunityController::class, 'store']);
Route::get('/communities/{community:alias}', [CommunityController::class, 'show']);

Route::post('/comments', [CommentController::class, 'store']);
Route::patch('/comments/{comment:id}', [CommentController::class, 'update']);

Route::redirect('/profile', '/user/profile');
