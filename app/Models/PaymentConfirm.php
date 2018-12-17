<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentConfirm extends Model
{
    protected  $table = "payment_confirm" ;
    protected $fillable = [
        'slug',
        'reservation_id',
        'confirm_code',
        'status',
    ];
    public function reservation()
    {
        return $this->belongsTo('App\Models\Reservation');
    }
}
