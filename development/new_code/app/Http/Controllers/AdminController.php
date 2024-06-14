<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        $dishes = Dish::paginate(8);

        return view('admin.index', compact('dishes'));
    }

    public function destroy(Dish $dish)
{
    $menuNumber = $dish->menu_number;

    $dish->delete();

    DB::statement("
        UPDATE dishes
        SET menu_number = menu_number - 1
        WHERE menu_number > :menuNumber
    ", ['menuNumber' => $menuNumber]);

    return redirect()->route('admin.dishes')->with('success', 'Dish deleted successfully');
}

    public function create()
    {
        $types = DishType::pluck('type', 'id')->toArray();

        return view('admin.createDish', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'type' => 'required',
        ]);

    $nextMenuNumber = Dish::max('menu_number') + 1;

        Dish::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'menu_number' => $nextMenuNumber,
        ]);

        return redirect()->route('admin.dishes')
        ->with('success', 'Gerecht is succesvol toegevoegd!');
    }
}
