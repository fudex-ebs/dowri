<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends BaseModel
{
 	protected $fillable = [
        'slug',
        'user_id',
        'car_id',
        'inspection_center_id',
        'date',
        'time_period',
        'status'
    ];
    public function getRouteKeyName() {
        return 'slug';
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }

    public function inspection_center()
    {
        return $this->belongsTo('App\Models\InspectionCenter');
    }

    public function ReservationCancels()
    {
        return $this->hasMany('App\Models\ReservationCancel');
    }

    public function discount()
    {
        return $this->hasOne('App\Models\Discount');
    }

    public function canceld()
    {
        return $this->ReservationCancels->where('status','verified')->first() ? true :false ;

    }

    public function valid()
    {
      if($this->canceld()){
        return false;
      }
      return true;

    }
}
