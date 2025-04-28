<?php

namespace App\Mail;

use App\Models\ReservationResteau;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationResteauConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    public function __construct(ReservationResteau $reservation)
    {
        $this->reservation = $reservation;
    }

    public function build()
    {
        return $this->subject('Confirmation de votre réservation de restaurant')
                    ->view('emails.reservation_resteau_confirmed');
    }
}