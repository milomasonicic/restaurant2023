<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\OrderMadeEvent;
use App\Notifications\NewOrderAlert;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderMadeEvent $event): void
    {
        //
        $order = $event->order;

        $user= User::find($order->user_id);

        $user->notify(new NewOrderAlert($order));
        
    }
}
