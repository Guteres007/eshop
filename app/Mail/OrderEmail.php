<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order_data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_data)
    {

        $this->order_data = $order_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        list(
            $order_data,
            $order_items,
            $delivery_payment_price,
            $order_total_price
        ) = $this->order_data;

        return $this->view('emails.order', [
            'order' => $order_data,
            'order_items' => $order_items,
            'delivery_payment_price' => $delivery_payment_price,
            'order_total_price' => $order_total_price
        ]);
    }
}
