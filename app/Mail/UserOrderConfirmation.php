<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserOrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $orderDetails;

    public function __construct($orderDetails)
    {
        $this->orderDetails = $orderDetails;
    }

    public function build()
    {
        return $this->subject('Order Confirmation')
                    ->view('emails.user_order_confirmation')
                    ->with(['orderDetails' => $this->orderDetails]);
    }
}
