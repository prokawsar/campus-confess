<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id','post_id','comment'];
    
        protected $appends = ['display_name'];
    
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    
        public function getUserAttribute()
        {
            return $this->user->email;
        }
    
        public function post()
        {
            return $this->belongsTo(UserPost::class);
        }
}
