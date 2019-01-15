<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day_off extends Model
{
    protected $table = 'day_offs';
    protected $filltable = [
    	'id',
    	'time_start',
    	'time_end',
    	'status',
    	'user_id',
    ];
}
