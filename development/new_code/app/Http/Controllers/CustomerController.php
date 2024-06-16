<?php

namespace App\Http\Controllers;

use App\Models\NewsMessage;
use App\Models\Page;

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

    public function showCustomPage(Page $page)
    {
        $components = $page->components;
        $editing = 0;
        $isView = true;

        return view('customer.custom-page', compact('page', 'components', 'editing', 'isView'));
    }

    public function showMenu()
    {
        return view('customer.menu');
    }
}
