<?php

namespace App\Mail;

// app/Mail/OrderConfirmation.php
namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $user;

    public function __construct(Order $order, $user)
    {
        $this->order = $order;
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.order_confirmation')
                    ->with([
                        'user' => $this->user,
                        'order' => $this->order,
                    ])
                    ->subject('Order Confirmation');
    }
}
