<?php

namespace App\Listeners;

use App\Events\OrderStatusChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Notification;

class SendOrderStatusNotification
{
    public function handle(OrderStatusChanged $event)
    {
        $order = $event->order;

        Notification::create([
            'user_id' => $order->user_id,
            'title'   => '📦 Order Status Updated',
            'body'    => "Your order #{$order->id} status changed to: {$order->status}.",
        ]);
    }
}

