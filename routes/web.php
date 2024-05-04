<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', function () {

    // $posts = array_map(function($post) {
    //     return $post->getContents();
    // }, Post::all());

    // dd($posts);



    // $documents = YamlFrontMatter::
    // parseFile(
    //     resource_path('posts/my-fourth-post.html')
    // );

    // dd($files);

    return view('posts', [
        'posts' => Post::all()
    ]);
    // return ['foo' => 'bar'];
});

Route::get('posts/{post}', function($slug) {
    return view('post', [
        'post' => Post::findOrFail($slug)
    ]);
});
