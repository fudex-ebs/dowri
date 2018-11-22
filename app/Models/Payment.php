<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  protected $fillable = [
        'slug',
        'p_id',
        'status',
        'reservation_id'
    ];
    public function reservation()
    {
        return $this->belongsTo('App\Models\Reservation');
    }
}
