<?php

namespace App\Services;

use App\Models\Order;
use Carbon\Carbon;

class TabletOrderService
{
    public function canPlaceOrder($reservation)
    {
        $lastOrder = Order::join('reservations', 'orders.reservation_id', '=', 'reservations.id')
            ->where('reservations.table_number', $reservation->table_number)
            ->orderBy('orders.order_time', 'desc')
            ->first();

        if ($lastOrder && $lastOrder->order_time) {
            $now = Carbon::now();
            $orderTime = Carbon::parse($lastOrder->order_time);
            $waitEndTime = $orderTime->copy()->addMinutes(10);

            if ($now->lt($waitEndTime)) {
                $waitTime = $now->diffInSeconds($waitEndTime);
                $waitMessage = $this->formatWaitTimeMessage($waitTime);

                return [
                    'canPlace' => false,
                    'waitMessage' => $waitMessage,
                ];
            }
        }

        return [
            'canPlace' => true,
            'waitMessage' => '',
        ];
    }

    private function formatWaitTimeMessage($waitTimeInSeconds)
    {
        $minutes = floor($waitTimeInSeconds / 60);
        $seconds = $waitTimeInSeconds % 60;

        $waitMessage = '';
        if ($minutes > 0) {
            $waitMessage .= $minutes.' '.($minutes == 1 ? 'minuut' : 'minuten');
            if ($seconds > 0) {
                $waitMessage .= ' en ';
            }
        }
        if ($seconds > 0 || $minutes == 0) {
            $waitMessage .= $seconds.' '.($seconds == 1 ? 'seconde' : 'seconden');
        }

        return $waitMessage;
    }
}
