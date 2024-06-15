<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $reservations = Reservation::whereDate('starttime', $today)
            ->orWhereDate('endtime', $today)
            ->get();

        return view('admin.reservations-index', compact('reservations'));
    }

    public function assignTable(Request $request, Reservation $reservation)
    {
        $request->validate([
            'table_number' => 'required|integer',
        ]);

        $reservation->table_number = $request->table_number;
        $reservation->save();

        return redirect()->back()->with('success', 'Table assigned successfully.');
    }
}
