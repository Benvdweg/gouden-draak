<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;

class NewsController extends Controller
{
    public function store(StoreNewsRequest $request)
    {
        $validated = $request->validated();

        return back()->withInput();
    }
}
