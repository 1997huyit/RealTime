<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Customer extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $table = 'customers';
        protected $fillable = [
	    'id',
	    'name',
	    'email',
	    'phone',
	    'address',
	    'customertype_id'
	];
	public function role(){
		return $this->belongsTo(CustomerType::class,'customertype_id','id');
	}
}
