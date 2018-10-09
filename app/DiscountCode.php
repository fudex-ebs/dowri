<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Basemodel
{
    protected $fillable = [
        'slug',
        'code',
        'start_date',
        'end_date',
        'amount'
    ];   
}
