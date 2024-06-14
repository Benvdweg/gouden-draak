<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Dish;

class OrderController extends Controller
{
    public function showOrders(Request $request)
    {
        $orders = $request->session()->get('orders', []);

        return view('tablet.orders', compact('orders'));
    }

    public function addToOrder(Request $request, Dish $dish)
    {
        $order = $request->session()->get('orders', []);

        $order[] = [
            'id' => $dish->id,
            'name' => $dish->name,
            'price' => $dish->price,
        ];

        $request->session()->put('orders', $order);

        return redirect()->route('orders.index')->with('success', 'Gerecht toegevoegd aan bestelling.');
    }

    public function processOrders(Request $request)
    {
        $orders = $request->session()->get('orders', []);

        $newOrder = Order::create([
            'table_number' => 1,
            'order_time' => Carbon::now(),
        ]);

        foreach ($orders as $order) {
            OrderLine::create([
                'order_id' => $newOrder->id,
                'dish_id' => $order['id'],
            ]);
        }

        $request->session()->forget('orders');

        return redirect()->route('tablet.index')->with('success', 'De bestelling is onderweg.');
    }
}
