<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Basemodel
{
 	protected $fillable = [
        'slug',
        'user_id',
        'car_id',
        'inspection_center_id',
        'date',
        'time_period',
    ];   
}
