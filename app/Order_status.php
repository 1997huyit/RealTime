<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;
use App\Order;
use App\Warehouse;
class Order_status extends Model
{
    protected $dates = ['deleted_at'];
    protected $table = 'order_statuses';
    protected $filltable = [
    	'id',
    	'name',
    	'time',
    	'confirm_image',
    	'order_id',
    	'warehouse_id',
    	'deleted_at',
	    'created_at',
	    'updated_at'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id',  'id');
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id',  'id');
    }
}
