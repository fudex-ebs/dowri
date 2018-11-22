<?php

namespace App\Listeners;

use App\Events\ReservationCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Mail\ReservationCreatedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Reservation;
use Log;

class SendReservationNotification
{
    public $reservation;
    /**
     * Create the event listener.
     *
     * @return void
     */
     public function __construct(Reservation $reservation)
     {
         $this->reservation = $reservation;
     }

    /**
     * Handle the event.
     *
     * @param  ReservationCreated  $event
     * @return void
     */
    public function handle(ReservationCreated $event)
    {
        SendSms($event->reservation->user->mobile_number,' لقد تم تاكيد حجزك بتاريخ'.$event->reservation->date.'|'.time_format($event->reservation->time_period));
        // Mail::to(['address' => $event->reservation->user->email])->send(new ReservationCreatedMail($event->reservation));
    }
}
