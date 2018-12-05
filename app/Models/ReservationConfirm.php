<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationConfirm extends Model
{
    protected  $table = "reservation_confirm" ;
    protected $fillable = [
        'slug',
        'reservation_id',
        'confirm_code',
        'status',
    ];
//    public function getRouteKeyName() {
//        return 'slug';
//    }
    public function reservation()
    {
        return $this->belongsTo('App\Models\Reservation');
    }
}
