<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin', 'contestant', 'disqualified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function photo(){
        return $this->hasOne('App\Photo');
    }

    public function userVote(){
        return $this->hasMany('App\UserVote');
    }

    public function userPhoto(){
        return $this->hasOne('App\UserPhoto');
    }

    public function isAdmin()
    {
        return $this->admin;
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($user) {
            $user->photo()->delete();
    });
}
}
