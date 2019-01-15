<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Truck;
class Item extends Model
{

    
    protected $table = 'items';
    protected $filltable = [
    	'id',
    	'name',
    	'amount',
    	'weight',
    	'unit',
    	'truck_id'
    ];
    public function truck()
    {
          return $this->belongsTo(Truck::class, 'truck_id',  'id');
    }
}
