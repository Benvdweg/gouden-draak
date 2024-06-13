<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\DishType;


class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $query = Dish::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('id', $request->input('search'));
        }

        if ($request->filled('category')) {
            $query->where('type_id', $request->input('category'));
        }

        $dishes = $query->get();
        $categories = DishType::all();

        return view('checkout.index', [
            'dishes' => $dishes,
            'categories' => $categories,
        ]);
    }
}
