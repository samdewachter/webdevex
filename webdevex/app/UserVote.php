<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserVote extends Model
{
	use SoftDeletes;

    public function User(){
        return $this->belongsTo('App\User');
    }
}
