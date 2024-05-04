<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Support\Facades\File;

use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post {

	public $title;
	public $excerpt;
	public $date;
	public $body;
	public $slug;

	public function __construct($title, $excerpt, $date, $body, $slug) {
		$this->body = $body;
		$this->title = $title;
		$this->date = $date;
		$this->excerpt = $excerpt;
		$this->slug = $slug;
	}

	public static function all() {
		return cache()->rememberForever('post.all', fn() =>
				collect(File::files(resource_path("posts/")))
		        ->map(fn($file) => YamlFrontMatter:: parseFile($file))
		        ->map(fn($doc) => new Post(
		            $doc->title,
		            $doc->matter('excerpt'),
		            $doc->date,
		            $doc->body(),
		            $doc->slug
		        ))->sortBy('date')
		);
	}

	public static function find($slug) {
		// if(! file_exists($path = resource_path("posts/{$slug}.html"))) {
	    //     throw new ModelNotFoundException();
	    // }

	    // // $post = cache()->remember("post.{$slug}", 5, function() use($path) {
	    // //     var_dump('cached');
	    // //     return file_get_contents($path);
	    // // });

	    // //or

	    // return cache()->remember("post.{$slug}", 5, fn() => file_get_contents($path));

		return static::all()->firstWhere('slug', $slug);
	}


	public static function findOrFail($slug) {
		$post = static::find($slug);
		if(! $post) {
			throw new ModelNotFoundException();
		}
		return $post;
	}
}