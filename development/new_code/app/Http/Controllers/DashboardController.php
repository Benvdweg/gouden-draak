<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishType;
use App\Models\NewsMessage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showNews()
    {
        $latestNews = NewsMessage::latest()->first();

        return view('news', compact('latestNews'));
    }

    public function showTabletIndex($tablenumber)
    {
        $categories = DishType::orderBy('type')->get();

        return view('tablet.index', compact('categories', 'tablenumber'));
    }

    public function showTabletDishes($tablenumber, $dishType)
    {
        $dishes = Dish::where('type_id', $dishType)->get();

        return view('tablet.dishes', compact('dishType', 'dishes', 'tablenumber'));
    }

    public function showTabletDashboard()
    {
        return view('tablet.dashboard');
    }

    public function setTableNumber(Request $request)
    {
        $request->validate(['tablenumber' => 'required']);
        return redirect()->route('tablet.index', ['tablenumber' => $request->tablenumber]);
    }

}
