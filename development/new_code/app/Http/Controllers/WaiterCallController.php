<?php

namespace App\Http\Controllers;

use App\Models\WaiterCall;

class WaiterCallController extends Controller
{
    public function index()
    {
        $calls = WaiterCall::where('handled', false)->orderBy('created_at', 'asc')->paginate(12);

        return view('admin.calls', compact('calls'));
    }

    public function store()
    {
        $reservation = session('current_reservation');

        $existingCall = WaiterCall::where('table_number', $reservation->table_number)
            ->where('handled', false)
            ->first();

        if ($existingCall) {
            return redirect()->route('tablet.index')->with('error', 'Er is al een ober onderweg naar uw tafel.');
        }


        WaiterCall::create([
           'table_number' => $reservation->table_number,
        ]);

        return redirect()->route('tablet.index')->with('success', 'De ober zal zo bij u zijn.');
    }

    public function update(WaiterCall $waiterCall)
    {
        $waiterCall->update(['handled' => true]);
        $waiterCall->save();

        return redirect()->back()->with('success', 'De melding is afgehandeld');
    }
}
