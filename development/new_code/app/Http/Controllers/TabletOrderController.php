<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginTableRequest;
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

    public function loginTable(LoginTableRequest $request)
    {
        $request->session()->forget(['email', 'current_reservation']);

        $request->session()->flash('email', $request->email);

        $email = $request->email;
        $currentTime = Carbon::now(config('app.timezone'));

        $reservation = Reservation::where('email', $email)
            ->whereNotNull('table_number')
            ->where('starttime', '<=', $currentTime)
            ->where('endtime', '>=', $currentTime)
            ->first();

        if (! $reservation) {
            return redirect()->back()->with('error', 'Geen geldige reservering gevonden.');
        }

        $request->session()->put('current_reservation', $reservation);

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
        /** @var Reservation $reservation */
        $reservation = session('current_reservation');

        $latestOrderLine = OrderLine::join('orders', 'order_lines.order_id', '=', 'orders.id')
            ->where('orders.reservation_id', $reservation->id)
            ->orderBy('orders.order_time', 'desc')
            ->orderBy('order_lines.created_at', 'desc')
            ->first();

        $roundNumber = $latestOrderLine ? $latestOrderLine->round_number + 1 : 1;

        if ($roundNumber > 5) {
            return redirect()->route('tablet.index')
                ->with('error', 'Je kunt maximaal 5 rondes plaatsen. Neem contact op met het personeel voor meer informatie.');
        }

        $orderCheck = $this->tabletOrderService->canPlaceOrder($reservation);

        if (! $orderCheck['canPlace']) {
            return redirect()->route('tablet.index')
                ->with('error', "Je moet nog {$orderCheck['waitMessage']} wachten voordat je een nieuwe bestelling kunt plaatsen.");
        }

        $orders = $request->session()->pull('orders', []);

        $newOrder = Order::create([
            'order_time' => Carbon::now(),
            'reservation_id' => $reservation->id,
        ]);

        $orderLines = [];
        foreach ($orders as $order) {
            $orderLines[] = [
                'order_id' => $newOrder->id,
                'dish_id' => $order['id'],
                'round_number' => $roundNumber,
            ];
        }

        OrderLine::insert($orderLines);

        return redirect()->route('tablet.index')->with('success', 'De bestelling is onderweg.');
    }

    public function favorite(Request $request, Dish $dish)
    {
        $favorites = $request->session()->get('favorites', []);

        if (! in_array($dish->id, $favorites)) {
            $favorites[] = $dish->id;
        } else {
            $favorites = array_diff($favorites, [$dish->id]);
            $message = 'Gerecht niet meer gemarkeerd als favoriet.';
        }

        $request->session()->put('favorites', $favorites);

        return redirect()->back()->with('success', 'Gerecht gemarkeerd als favoriet!');
    }

    public function showFavorites()
    {
        $favoriteIds = session()->get('favorites', []);

        $favorites = Dish::whereIn('id', $favoriteIds)->get();

        return view('tablet.favorites', [
            'favorites' => $favorites,
        ]);
    }

    public function orderHistory()
    {
        /** @var Reservation $reservation */
        $reservation = session('current_reservation');

        $orders = Order::where('reservation_id', $reservation->id)->get();

        return view('tablet.order_history', compact('orders'));
    }

    public function showPrevOrder($roundNumber)
    {
        $orderLines = OrderLine::where('round_number', $roundNumber)->get();

        return view('tablet.show_prev_order', compact('orderLines', 'roundNumber'));
    }

    public function showCallWaiter()
    {
        $reservation = session('current_reservation');

        return view('tablet.call-waiter', compact('reservation'));
    }

    public function addWholeOrder(Request $request)
    {
        $orderLineIds = $request->input('orderlines', []);

        $orderLines = OrderLine::whereIn('id', $orderLineIds)->get();

        foreach ($orderLines as $orderLine) {

            $dish = $orderLine->dish;

            $order = $request->session()->get('orders', []);

            $order[] = [
                'id' => $dish->id,
                'name' => $dish->name,
                'price' => $dish->price,
            ];

            $request->session()->put('orders', $order);
        }

        return redirect()->route('tablet.index')->with('success', 'Hele bestelling is toegevoegd.');
    }
}
