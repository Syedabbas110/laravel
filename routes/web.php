<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

Route::get('/', fn () =>
    view('posts', ['posts' => Post::latest()->get()])
);

Route::get('posts/{post:slug}', fn(Post $post) => 
    view('post', ['post' => $post])
);


Route::get('categories/{category:slug}', fn(Category $category) =>
    view('posts', ['posts' => $category->posts])
);

Route::get('author/{author:username}', fn(User $author) =>
    view('posts', ['posts' => $author->posts])
);