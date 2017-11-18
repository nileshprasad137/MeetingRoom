<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Thread extends Model
{
    protected $table = "chatthread";
    protected $fillable = ['thread_title','thread_category'];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }   
}
