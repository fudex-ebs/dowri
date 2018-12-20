<?php

namespace App\Services\Reservation;

use App\Models\ReservationCancel;
use App\Models\Reservation;

class ReservationCancelService{

    public function create(Reservation $reservation){
      $reservationCancel = ReservationCancel::create([
          'slug' => uniqid(),
          'varify_code' => rand (0,99999),
          'reservation_id' => $reservation->id,
          'status' => 'unverified',
      ]);
      $this->send_cancel_code($reservationCancel);
      return $reservationCancel;
    }

    public function send_cancel_code($reservationCancel){
      $msg = 'رمز الالغاء هو '.$reservationCancel->varify_code;
      $mobile_number = $reservationCancel->reservation->user->mobile_number;
      SendSms($mobile_number,$msg);
    }
    public function send_cancel_sms($reservation){
        $msg = 'تم إلغاء حجزك رقم '.$reservation->slug;
        $mobile_number = $reservation->user->mobile_number;
        $res = SendSms($mobile_number,$msg);
        return $res ;
    }

}
