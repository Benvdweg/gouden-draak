<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignTableRequest;
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

    public function assignTable(AssignTableRequest $request, Reservation $reservation)
    {
        $validated = $request->validated();

        $reservation->table_number = $validated['table_number'];
        $reservation->save();

        return redirect()->back()->with('success', 'Tafel toegewezen aan reservering.');
    }
}
