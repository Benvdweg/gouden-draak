<?php

namespace App\Http\Controllers;

use App\Models\WaiterCall;
use Illuminate\Http\Request;

class WaiterCallController extends Controller
{
    public function index()
    {
        $calls = WaiterCall::where('handled', false)->get();

        return view('admin.calls', compact('calls'));
    }
}
