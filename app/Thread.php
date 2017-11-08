<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;

class Thread extends Model
{
    protected $table = "chatthread";
    public function posts()
    {
        return $this->hasMany(Post::class);
    }   
    public function post_one()
    {
        return $this->hasOne(Post::class);
    }
    public function threadLeader()
    {
        //return $this->hasOne(User::class);
        /**
         * We can't use hasOne Relationship here as there is no column called thread_id in users table.
         * We were able to use hasOne relationship in posts() function as we had thread_id column in posts table
         */
    }    
}
