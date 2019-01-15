<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Maintenance_schedule;
use App\Image_truck;
class Truck extends Model
{
	use SoftDeletes;
    protected $table = 'trucks';
        protected $fillable = [
	    'id',
	    'name',
	    'licenseplate',
	    'manufacturer',
	    'registration1',
	    'registration2'
	];
	protected $dates = ['deleted_at'];
	public function image()
    {
        return $this->hasMany(Image_truck::class, 'id');
    }
    public function maintenance(){
    	return $this->hasOne('App\Maintenance_schedule');
    }
}
