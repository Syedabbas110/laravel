<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['author', 'category'];


    protected $fillable = ['slug', 'title', 'category_id' , 'excerpt', 'body', 'user_id'];

    public function category() {
        //hasOne, hasMany, belongsTo, belongsToMany

        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
