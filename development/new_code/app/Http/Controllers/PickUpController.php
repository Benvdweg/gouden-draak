<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishType;
use App\Models\Order;
use App\Models\OrderLine;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PickUpController extends Controller
{
    public function showCategoryMenu()
    {
        $categories = DishType::orderBy('type')->get();

        return view('customer.pick-up-menu-categories', compact('categories'));
    }

    public function showDishMenu($category)
    {
        $dishes = Dish::where('type_id', $category)->get();

        return view('customer.pick-up-menu-dishes', compact('dishes'));
    }


    public function addToOrder(Request $request, Dish $dish)
    {
        $order = $request->session()->get('pickup-orders', []);

        $order[] = [
            'id' => $dish->id,
            'name' => $dish->name,
            'price' => $dish->price,
        ];

        $request->session()->put('pickup-orders', $order);

        $orders = $request->session()->get('pickup-orders', []);

        return view('customer.pick-up-orders', compact('orders'))->with('success', 'Gerecht toegevoegd aan bestelling.');
    }

    public function showOrders(Request $request)
    {
        $orders = $request->session()->get('pickup-orders', []);

        return view('customer.pick-up-orders', compact('orders'));
    }

    public function processOrders(Request $request)
    {
        $orders = $request->session()->pull('pickup-orders', []);

        $newOrder = Order::create([
            'order_time' => Carbon::now(),
            'email' => $request['email'],
        ]);

        $orderLines = [];
        foreach ($orders as $order) {
            $orderLines[] = [
                'order_id' => $newOrder->id,
                'dish_id' => $order['id'],
            ];
        }

        OrderLine::insert($orderLines);

        return redirect()->route('customer.news')->with('success', 'De bestelling is onderweg.');
    }
}
