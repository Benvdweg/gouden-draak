<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;


class CheckoutController extends Controller
{
    public function show(Request $request)
    {
        $query = Dish::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('id', $request->input('search'));
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $dishes = $query->get();

        return view('checkout.index', ['dishes' => $dishes]);
    }
}
