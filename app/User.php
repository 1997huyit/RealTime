<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'phone',
        'passport_1',
        'passport_2',
        'birthday',
        'address',
        'sex',
        'user_type_id',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function role()
     {
          return $this->belongsTo(User_type::class, 'user_type_id',  'id');
     }
     public function day_off(){
        return $this->hasOne('App\Day_off', 'user_id', 'id');
    }

}
