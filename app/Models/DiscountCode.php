<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountCode extends BaseModel
{
    protected $fillable = [
        'slug',
        'code',
        'start_date',
        'end_date',
        'amount',
        'status',
    ];
    public function getRouteKeyName() {
        return 'slug';
    }
    
}
