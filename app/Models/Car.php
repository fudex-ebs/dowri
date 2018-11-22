<?php

namespace App\Models;

class Car extends BaseModel
{
    protected $fillable = [
        'slug',
        'plate_number',
        'serial_number',
        'car_type_id',
        'manufacture_year',
        'model',
        'register_expire_date'
    ];

    public function car_type()
    {
        return $this->belongsTo('App\Models\CarType');
    }
}
