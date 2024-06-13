<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\DishType;

class AdminController extends Controller
{
    public function index()
    {
        $dishes = Dish::paginate(8);
        return view('admin.index', compact('dishes'));
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('admin')->with('success', 'Dish deleted successfully');
    }
}
