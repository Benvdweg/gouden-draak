<?php

namespace App\Http\Controllers;

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
}
