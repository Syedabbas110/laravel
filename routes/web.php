<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('author/{author:username}', fn(User $author) =>
    view('posts', [
        'posts' => $author->posts
    ])
);