<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Branches;

class MobileShopReservationController extends Controller
{
	public function store(Request $request, $branch)
	{
		// Validate the incoming request data
		$validator = Validator::make($request->all(), [
			'name' => 'required|string|max:255',
			'phone' => 'required|numeric',
			'reservation_date' => 'required|date',
			'reservation_time' => 'required|date_format:H:i',
		]);

		// Check if validation fails
		if ($validator->fails()) {
			return response()->json(['errors' => $validator->errors()], 422);
		}

		// Generate a unique reservation_id
		$reservationId = Str::uuid()->toString();

		// Save the reservation data to the database
		$reservation = new Reservation([
			'branch_id' => $branch,
			'reservation_id' => $reservationId,
			'name' => $request->input('name'),
			'phone' => $request->input('phone'),
			'reservation_date' => $request->input('reservation_date'),
			'reservation_time' => $request->input('reservation_time'),
			'status' => 1,
		]);

		$reservation->save();

		if ($reservation)
		{
			return response()->json([
				'status' => 200,
				'data' => '',
				'message' => 'Reservation added successfully.'
			]);
		}
	}

	public function getReservations($customerId)
	{
		$customer = Customer::findOrFail($customerId);
		
		$reservations = Reservation::where('phone', $customer->phone_number)->get();
		
		foreach ($reservations as $reservation) {
			$branchInfo = Branches::findOrFail($reservation->branch_id);
			$reservation->branch_info = $branchInfo;
		}

		return response()->json([
			'status' => 200,
			'data' => $reservations,
			'message' => 'Reservations fetched successfully.'
		]);
		
	}

	public function getBranchReservations($branchID)
	{
		$branch = Branches::findOrFail($branchID);

		$reservations = Reservation::where('branch_id', $branch->id)->get();

		if (! empty($reservations))
		{
			return response()->json([
				'status' => 200,
				'data' => $reservations,
				'message' => 'Branch reservations fetched successfully.',
			]);
		}
	}
}