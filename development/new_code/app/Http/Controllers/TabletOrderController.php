<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishType;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Reservation;
use App\Services\TabletOrderService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TabletOrderController extends Controller
{
    public function __construct(private readonly TabletOrderService $tabletOrderService)
    {
    }

    public function showTabletIndex()
    {
        $categories = DishType::orderBy('type')->get();

        $reservation = session('current_reservation');

        return view('tablet.index', compact('categories', 'reservation'));
    }

    public function showTabletDishes($dishType)
    {
        $reservation = session('current_reservation');
        $dishes = Dish::where('type_id', $dishType)->get();

        return view('tablet.dishes', compact('dishType', 'dishes', 'reservation'));
    }

    public function showTabletDashboard()
    {
        return view('tablet.dashboard');
    }

    public function loginTable(Request $request)
    {
        $request->validate(['email' => 'required']);

        $request->session()->forget('email');
        $request->session()->forget('current_reservation');

        $request->session()->flash('email', $request->email);

        $email = $request->email;
        $currentTime = Carbon::now(config('app.timezone'));

        $reservation = Reservation::where('email', $email)
            ->whereNotNull('table_number')
            ->where('starttime', '<=', $currentTime)
            ->where('endtime', '>=', $currentTime)
            ->first();

        if ($reservation) {
            $request->session()->put('current_reservation', $reservation);
        } else {
            return redirect()->back()->with('error', 'Geen geldige reservering gevonden.');
        }

        return redirect()->route('tablet.index');
    }

    public function showOrders(Request $request)
    {
        $reservation = session('current_reservation');
        $orders = $request->session()->get('orders', []);

        return view('tablet.orders', compact('orders', 'reservation'));
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
        $reservation = session('current_reservation');

        $orderCheck = $this->tabletOrderService->canPlaceOrder($reservation);

        if (!$orderCheck['canPlace']) {
            return redirect()->route('tablet.index')
                ->with('error', "Je moet nog {$orderCheck['waitMessage']} wachten voordat je een nieuwe bestelling kunt plaatsen.");
        }

        $orders = $request->session()->get('orders', []);

        $newOrder = Order::create([
            'order_time' => Carbon::now(),
            'reservation_id' => $reservation->id,
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
