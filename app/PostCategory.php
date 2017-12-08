<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function post_count()
    {   // Need to get category id, name, number of post accociated with that category and order by name

    
            $total =DB::table('user_posts')
                    ->select(DB::raw('count(posts) as total, cat_name'))
                   ->leftJoin('post_category', 'post_category.id', '=', 'user_posts.cat_id')
                    ->groupBy('cat_id')
                    ->get();

            return $total;


    }
}
