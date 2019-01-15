<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{

    protected $table = 'user_types';
    protected $fillable = [
        'id',
        'name',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
    public function users(){
        return $this->hasMany('App\User','user_type_id', 'id');
    }
    public function drivers(){
        return $this::find(7)->hasMany('App\User','id');
    }
}
