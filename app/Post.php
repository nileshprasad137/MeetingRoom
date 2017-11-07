<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Thread;

class Post extends Model
{
    protected $table = "posts";    
    public function thread()
    {
        return $this->belongsto(Thread::class);
    }
}
