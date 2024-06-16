<?php

namespace App\Http\Controllers;

use App\Models\NewsMessage;

class CustomerController extends Controller
{
    public function showContact()
    {
        return view('customer.contact');
    }

    public function showNews()
    {
        $latestNews = NewsMessage::latest()->first();

        return view('customer.news', compact('latestNews'));
    }
}
