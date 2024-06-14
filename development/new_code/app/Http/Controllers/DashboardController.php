<?php

namespace App\Http\Controllers;

use App\Models\NewsMessage;

class DashboardController extends Controller
{
    public function showNews()
    {
        $latestNews = NewsMessage::latest()->first();

        return view('news', compact('latestNews'));
    }
}
