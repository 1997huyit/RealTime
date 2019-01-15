<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerType extends Model
{
    protected $table = 'customer_types';
        protected $fillable = [
	    'id',
	    'name',
	    'deleted_at',
	    'created_at',
	    'updated_at', 
	];
	public function customs(){
		return $this->hasMany(Customer::class,'id');
	}
	
}