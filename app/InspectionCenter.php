<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspectionCenter extends Basemodel
{
    protected $fillable = [
        'slug',
        'name',
        'city',
        'hourly_capacity',
        'mobile_number',
        'email'
    ];   
}
