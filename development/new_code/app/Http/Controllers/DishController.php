<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditDishRequest;
use App\Http\Requests\StoreDishRequest;
use App\Models\Addition;
use App\Models\Dish;
use App\Models\DishType;
use Illuminate\Support\Facades\DB;

class DishController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    public function index()
    {
        $dishes = Dish::withMenuOrAddition()->paginate(8);

        return view('admin.dishes.index', compact('dishes'));
    }

    public function destroy(Dish $dish)
    {
        DB::transaction(function () use ($dish) {
            $menuNumber = $dish->menu_number;

            $dish->delete();

            Dish::where('menu_number', '>', $menuNumber)
                ->decrement('menu_number');
        });

        return redirect()->route('admin.dishes')->with('success', 'Gerecht is verwijderd');
    }

    public function create()
    {
        $types = DishType::pluck('type', 'id')->toArray();

        return view('admin.dishes.create-dish', compact('types'));
    }

    public function store(StoreDishRequest $request)
    {
        DB::transaction(function () use ($request) {
            $nextMenuNumber = Dish::max('menu_number') + 1;

            Dish::create([
                'name' => $request->input('name'),
                'price' => (float) $request->input('price'),
                'description' => $request->input('description'),
                'type' => $request->input('type'),
                'menu_number' => $nextMenuNumber,
            ]);
        });

        return redirect()->route('admin.dishes')
            ->with('success', 'Gerecht is succesvol toegevoegd!');
    }

    public function edit(Dish $dish)
    {
        $dish->addition = json_decode($dish->addition);

        return view('admin.dishes.edit', compact('dish'));
    }

    public function update(EditDishRequest $request, Dish $dish)
    {
        $additionId = null;

        if ($request->filled('addition')) {
            $addition = Addition::firstOrCreate(['letter' => $request->addition]);
            $additionId = $addition->id;
        }

        $dish->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'menu_number' => $request->menu_number,
            'addition_id' => $additionId,
        ]);

        return redirect()->route('admin.dishes')->with('success', 'Gerecht succesvol bijgewerkt');
    }
}
