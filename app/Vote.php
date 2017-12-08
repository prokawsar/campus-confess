<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{   
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vote';
    protected $fillable=['title','vote_description'];
    
    public function vote_options()
    {
        return $this->hasMany(\App\VoteOption::class);
    }

}
