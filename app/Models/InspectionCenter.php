<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InspectionCenter extends BaseModel
{
    protected $fillable = [
        'slug',
        'name',
        'name_en',
        'city_id',
        'hourly_capacity',
        'mobile_number',
        'email',
        'ad_img',
        'status',
    ];

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    public function capacity_modifications()
    {
        return $this->hasMany('App\Models\CapacityModification');
    }

    public function has_capacity_modifications_at_date($date)
    {
        return $this->capacity_modifications->where('date',$date)->count() ? true : false ;
    }


    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation','inspection_center_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($inspection_center) {
             $inspection_center->reservations()->delete();

        });
    }

    public function capacity($date,$time_period)
    {
        $capacity_modification = $this->capacity_modifications->where('date',$date)->first();
        if ($capacity_modification){
        	return $capacity_modification->$time_period;
        }
        return $this->hourly_capacity / 4 ;

    }
    public function valid_reservations(){
        return $this->hasMany('App\Models\Reservation','inspection_center_id')->where('status','valid');

    }


}
