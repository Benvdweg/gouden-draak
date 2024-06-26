<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessOrderRequest;
use App\Models\Dish;
use App\Models\DishType;
use App\Models\Order;
use App\Models\OrderLine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PickUpController extends Controller
{
    public function displayOrders(Request $request)
    {
        $orders = $request->session()->get('pickup-orders', []);
        return view('customer.pick-up-orders', compact('orders'));
    }

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

    public function processOrders(ProcessOrderRequest $request)
    {
        $orders = $request->session()->pull('pickup-orders', []);

        $newOrder = Order::create([
            'order_time' => Carbon::now(),
            'email' => $request['email'],
        ]);

        $orderLines = [];
        $qrCodeData = 'Bestelnummer: '.$newOrder->id."\n\n";

        foreach ($orders as $order) {
            $orderLines[] = [
                'order_id' => $newOrder->id,
                'dish_id' => $order['id'],
            ];

            $dish = Dish::find($order['id']);
            $qrCodeData .= 'Gerechtnummer: '.$dish->id."\n";
            $qrCodeData .= 'Gerecht: '.$dish->name."\n\n";
        }

        OrderLine::insert($orderLines);

        $qrCode = QrCode::size(300)->generate($qrCodeData);

        return view('customer.pick-up-confirmation', [
            'qrCode' => $qrCode,
            'orderId' => $newOrder->id,
        ]);
    }
}
