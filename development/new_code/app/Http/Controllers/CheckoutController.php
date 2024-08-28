<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishType;
use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $query = Dish::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->input('search').'%')
                ->orWhere('id', $request->input('search'));
        }

        if ($request->filled('category')) {
            $query->where('type_id', $request->input('category'));
        }

        $dishes = $query->get();
        $categories = DishType::all();

        return view('admin.checkout.index', [
            'dishes' => $dishes,
            'categories' => $categories,
        ]);
    }

    public function showOrders()
    {
        $orders = Order::orderBy('order_time', 'desc')->paginate(8);

        return view('admin.checkout.orders', compact('orders'));
    }

    public function showOrderLines(Order $order)
    {
        return view('admin.checkout.orderLines', compact('order'));
    }

    public function showComment($orderLineId)
    {
        $orderLine = OrderLine::find($orderLineId);
        $comments = OrderLine::select('comment')
            ->groupBy('comment')
            ->havingRaw('COUNT(comment) > 1')
            ->get();

        return view('admin.checkout.comment', compact('orderLine', 'comments'));
    }

    public function updateComment(Request $request, $orderId)
    {
        $request->validate([
            'opmerking' => 'required|string|max:255',
        ]);

        $orderLine = OrderLine::findOrFail($orderId);

        $orderLine->comment = $request->input('opmerking');
        $orderLine->save();

        $orders = Order::orderBy('order_time', 'desc')->paginate(8);

        return redirect()->route('checkout.orders', compact('orders'))->with('success', 'Opmerking succesvol bijgewerkt.');
    }
}

