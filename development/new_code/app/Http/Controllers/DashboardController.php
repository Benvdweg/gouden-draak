<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishType;
use App\Models\NewsMessage;

class DashboardController extends Controller
{
    public function showNews()
    {
        $latestNews = NewsMessage::latest()->first();

        return view('news', compact('latestNews'));
    }

    public function showTabletDashboard()
    {
        $categories = DishType::orderBy('type')->get();

        return view('tablet.index', compact('categories'));
    }

    public function showTabletDishes($dishType)
    {
        $dishes = Dish::where('type_id', $dishType)->get();

        return view('tablet.dishes', compact('dishType', 'dishes'));
    }
}
