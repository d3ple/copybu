<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommunityController;


Route::get('/', [PostController::class, 'index']);

Route::get('/posts/{post:alias}', [PostController::class, 'show']);

Route::get('/communities/{community:alias}', [CommunityController::class, 'show']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
