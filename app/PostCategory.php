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

        $total = DB::select('SELECT post_category.id AS cat_id, post_category.cat_name AS name, total.total_post AS total_post 
        FROM post_category, (SELECT cat_id, COUNT(cat_id) total_post FROM user_posts GROUP BY cat_id) AS total 
        WHERE total.cat_id = post_category.id
        ORDER by cat_name');

    // From somewhere I get, but not working
    
    //    $total = DB::select('post_category.id as cat_id','post_category.cat_name as name','total.total_post as total_post')
    //     ->from('post_category')
    //     ->from('SELECT cat_id, COUNT(cat_id) total_post FROM user_posts GROUP BY cat_id as total')
    //     ->where('total.cat_id', '=', 'post_category.id')
    //     ->orderBy('cat_name', 'ASC')
    //     ->get();

        return $total;
    }
}
