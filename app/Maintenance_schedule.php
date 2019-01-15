<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Truck;
class Maintenance_schedule extends Model
{
    use SoftDeletes;
    protected $table = 'maintenance_schedules';
        protected $fillable = [
	    'id',
	    'start_date',
	    'end_date',
	    'truck_id'
	];
	protected $dates = ['deleted_at'];
	public function truck()
    {
          return $this->belongsTo(Truck::class, 'truck_id',  'id');
    }
}
