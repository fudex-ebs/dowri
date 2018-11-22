<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Reservation;
use PDF;

class ReservationCreatedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $reservation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(Reservation $reservation)
     {
         $this->reservation = $reservation;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = PDF::loadView('pdf.ticket',['reservation' => $this->reservation]);
        return $this->view('mail.reservation_created',['reservation' => $this->reservation])->attachData($pdf->output(),'ticket.pdf');
    }
}
