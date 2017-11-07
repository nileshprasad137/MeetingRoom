<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Thread extends Model
{
    protected $table = "chatthread";
    public function posts()
    {
        return $this->hasMany(Post::class);
    }    
}
