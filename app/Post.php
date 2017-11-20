<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Thread;

class Post extends Model
{
    protected $table = "posts";    
    protected $fillable = ['post_content', 'created_at', 'updated_at'];    
}
