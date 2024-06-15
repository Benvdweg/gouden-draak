<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishType;
use App\Models\Order;
use App\Models\OrderLine;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TabletOrderController extends Controller
{
    public function showTabletIndex($tablenumber)
    {
        $categories = DishType::orderBy('type')->get();

        return view('tablet.index', compact('categories', 'tablenumber'));
    }

    public function showTabletDishes($tablenumber, $dishType)
    {
        $dishes = Dish::where('type_id', $dishType)->get();

        return view('tablet.dishes', compact('dishType', 'dishes', 'tablenumber'));
    }

    public function showTabletDashboard()
    {
        return view('tablet.dashboard');
    }

    public function setTableNumber(Request $request)
    {
        $request->validate(['tablenumber' => 'required']);

        return redirect()->route('tablet.index', ['tablenumber' => $request->tablenumber]);
    }

    public function showOrders(Request $request, $tablenumber)
    {
        $orders = $request->session()->get('orders', []);

        return view('tablet.orders', compact('orders', 'tablenumber'));
    }

    public function addToOrder(Request $request, $tablenumber, Dish $dish)
    {
        $order = $request->session()->get('orders', []);

        $order[] = [
            'id' => $dish->id,
            'name' => $dish->name,
            'price' => $dish->price,
        ];

        $request->session()->put('orders', $order);

        return redirect()->route('orders.index', ['tablenumber' => $tablenumber])->with('success', 'Gerecht toegevoegd aan bestelling.');
    }

    public function processOrders(Request $request, $tablenumber)
    {
        $lastOrder = Order::where('table_number', $tablenumber)
            ->orderBy('order_time', 'desc')
            ->first();

        if ($lastOrder && $lastOrder->order_time) {
            $now = Carbon::now();
            $orderTime = Carbon::parse($lastOrder->order_time);
            $waitEndTime = $orderTime->copy()->addMinutes(10);

            if ($now->lt($waitEndTime)) {
                $secondsToWait = $now->diffInSeconds($waitEndTime);

                $minutes = floor($secondsToWait / 60);
                $seconds = $secondsToWait % 60;

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

                return redirect()->route('tablet.index', ['tablenumber' => $tablenumber])
                    ->with('error', "Je moet nog $waitMessage wachten voordat je een nieuwe bestelling kunt plaatsen.");
            }
        }

        $orders = $request->session()->get('orders', []);

        $newOrder = Order::create([
            'table_number' => $tablenumber,
            'order_time' => Carbon::now(),

        ]);

        foreach ($orders as $order) {
            OrderLine::create([
                'order_id' => $newOrder->id,
                'dish_id' => $order['id'],
            ]);
        }

        $request->session()->forget('orders');

        return redirect()->route('tablet.index', ['tablenumber' => $tablenumber])->with('success', 'De bestelling is onderweg.');
    }
}
