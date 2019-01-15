<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Truck;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image_truck extends Model
{
    use SoftDeletes;
    protected $table = 'image_trucks';
        protected $fillable = [
	    'id',
	    'image',
	    'truck_id',
	];
	protected $dates = ['deleted_at'];
	public function truck()
    {
          return $this->belongsTo(Truck::class, 'truck_id',  'id');
    }
}
