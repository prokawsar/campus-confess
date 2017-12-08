<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoteOption extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vote_option';
    protected $fillable=['opt_name','vote_id'];


    public function in_vote()
    {
        return $this->hasOne(\App\Vote::class);
    }

}
