<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationCancel extends BaseModel
{
  protected $fillable = [
        'slug',
        'reservation_id',
        'varify_code',
        'status',
    ];
    public function getRouteKeyName() {
        return 'slug';
    }
    public function reservation()
    {
        return $this->belongsTo('App\Models\Reservation');
    }
}
