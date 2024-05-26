<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class AdminPostController extends Controller
{
    //
    public function index() {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create() {
        return view('admin.posts.create');
    }

    public function store() {
        // dd(request()->all());
        Post::create(array_merge($this->validatePost(), [
            'user_id' => auth()->id(),
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        return redirect('/');
    }


    public function edit(Post $post) {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post) {
        $attributes = $this->validatePost($post);

        if($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('Success', 'Post Updated');
    }

    public function destroy(Post $post) {
        $post->delete();

        return back()->with('Success', 'Post Deleted');
    }

    protected function validatePost(?Post $post = null)
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            // 'published_at' => 'required'
        ]);
    }
}
