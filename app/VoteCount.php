<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoteCount extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vote_count';
    protected $fillable=['vote_id','opt_id', 'user_id'];
    
}
