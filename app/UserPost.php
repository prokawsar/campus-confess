<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPost extends Model
{
    //
    use SoftDeletes;
    protected $dates=['deleted_at'];

    protected $fillable=['posts','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
