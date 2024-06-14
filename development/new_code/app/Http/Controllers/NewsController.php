<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Models\NewsMessage;

class NewsController extends Controller
{
    public function show()
    {
        $latestNews = NewsMessage::latest()->first();

        return view('admin.news-index', compact('latestNews'));
    }

    public function store(StoreNewsRequest $request)
    {
        NewsMessage::create($request->validated());

        return redirect()->route('admin.news.index')
            ->with('success', 'Nieuws bericht is aangemaakt');
    }
}
