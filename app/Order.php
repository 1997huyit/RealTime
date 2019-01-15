<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;
use App\Item;
use App\User;
use App\Order_status;
use App\Truck;
class Order extends Model
{

    protected $dates = ['deleted_at'];
    protected $table = 'orders';
    protected $filltable = [
    	'id',
    	'name',
    	'deliveryaddress',
    	'takenaddress',
    	'shippingcost',
    	'payment_status',
    	'driver_id',
    	'user_id',
        'customer_id',
        'truck_id',
    	'deleted_at',
	    'created_at',
	    'updated_at'
    ];
    public function items()
    {
        return $this->hasMany(Item::class, 'order_id', 'id');
    }
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id',  'id');
    }
    public function extra()
    {
        return $this->belongsTo(User::class, 'extra_id',  'id');
    }
    public function order_status()
    {
        return $this->hasMany(Order_status::class, 'id');
    }
    public function truck()
    {
        return $this->belongsTo(Truck::class, 'truck_id',  'id');
    }
}
