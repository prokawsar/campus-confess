<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'post_category';

    public function userpost()
    {
        return $this->hasMany(\App\UserPost::class);
    }
}
