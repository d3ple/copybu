<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommunityController;


Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth')->name('posts.create');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post:id}', [PostController::class, 'show']);

Route::get('/communities/create', [CommunityController::class, 'create'])->middleware('auth')->name('communities.create');
Route::post('/communities', [CommunityController::class, 'store']);
Route::get('/communities/{community:alias}', [CommunityController::class, 'show']);

Route::redirect('/profile', '/user/profile');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
