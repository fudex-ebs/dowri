<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Basemodel
{
    protected $fillable = [
        'slug',
        'user_id',
        'plate_number',
        'serial_number'
    ];   
}
