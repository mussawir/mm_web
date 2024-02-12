<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
	public function index($branch)
	{
		$reservations = Reservation::where('branch_id', $branch)
			->latest()
			->paginate(25);

		return view('admin.reservations.index', compact('reservations'));
	}

	public function showReservationform()
	{
		return view('front.reservation');
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'phone' => 'required|string|max:20',
			'reservation_date' => 'required|date',
			'reservation_time' => 'required|date_format:H:i',
		]);

		// Generate a unique reservation_id
		$reservationId = Str::uuid()->toString();

		// Save the reservation data to the database
		$reservation = new Reservation([
			'branch_id' => $request->input('selectedBranch'),
			'reservation_id' => $reservationId,
			'name' => $request->input('name'),
			'phone' => $request->input('phone'),
			'reservation_date' => $request->input('reservation_date'),
			'reservation_time' => $request->input('reservation_time'),
			'status' => 1,
		]);

		$reservation->save();

		return redirect()->route('reservation.success');
	}

	public function markAsReserved($id)
	{
		$reservation = Reservation::findorFail($id);
		$reservation->status = 2;
		
		$reservation->save();
		
		return redirect()->back()->with('message', 'Reserved successfully!');
	}

	public function cancelReservation($id)
	{
		$reservation = Reservation::findOrFail($id);
		$reservation->status = 3;

		$reservation->save();

		return redirect()->back()->with('message', 'Reservation canceled successfully!');
	}
}
