<?php

namespace App\Mail;

use App\Models\ConsecutiveOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GiftNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct(ConsecutiveOrder $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('You have received a gift from us!')
                    ->view('emails.gift_notification');
    }
}
