<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishType;
use Illuminate\Http\Request;

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

        return redirect()->route('admin.dishes')->with('success', 'Dish deleted successfully');
    }

    public function create()
    {
        $types = DishType::pluck('type', 'id')->toArray();

        return view('admin.createDish', compact('types'));
    }

    // Methode om een nieuw gerecht op te slaan
    public function store(Request $request)
    {
        // Valideer de input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'type' => 'required',
        ]);

    $nextMenuNumber = Dish::max('menu_number') + 1;

        // Maak een nieuw gerecht aan in de database
        Dish::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'menu_number' => $nextMenuNumber,
        ]);

        // Redirect naar de indexpagina met een succesbericht
        return redirect()->route('admin.dishes')
        ->with('success', 'Gerecht is succesvol toegevoegd!');
    }
}
