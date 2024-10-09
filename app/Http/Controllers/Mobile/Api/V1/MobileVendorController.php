<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\OperatorMaster;
use Illuminate\Http\Request;

class MobileVendorController extends Controller
{
	private function getDistance($lat1, $lon1, $lat2, $lon2) {
		$earthRadius = 6371; // in kilometers

		$dLat = deg2rad($lat2 - $lat1);
		$dLon = deg2rad($lon2 - $lon1);

		$a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
		$c = 2 * atan2(sqrt($a), sqrt(1 - $a));

		$distance = $earthRadius * $c;

		return $distance;
	}

	public function index(Request $request)
	{
		// users location coordinates
		$latitude = $request->input('latitude');
		$longitude = $request->input('longitude');

		// user selected vendor type
		// $vendorType = $request->input('vendorType');

		// fetching all operators
		$operators = OperatorMaster::with('details')->get();

		// filtering operators based on distance
		$filteredOperators=[];
		foreach($operators as $operator) {
			$operatorLocation = json_decode($operator->details->operation_geo_location);
			$operatorRadius = $operator->details->operation_radius;

			if($operatorLocation && $operatorRadius) {
				$distance = $this->getDistance($latitude, $longitude, $operatorLocation->latitude, $operatorLocation->longitude);

				if($distance > $operatorRadius) {
					continue;
				}

				$operator->distance = $distance;
				$filteredOperators[] = $operator;
			}
		}

		// Extracting operator IDs from the filteredOperators array
		$operatorIds = array_column($filteredOperators, 'id');

		$vendors = Vendor::whereIn('operator_id', $operatorIds)->with('vendorType')->get();

		return response()->json([
			'status' => 200,
			'message' => 'Vendors retrieved successfully.',
			'data' => $vendors,
			'operators' => $filteredOperators
		]);
	}

	public function getVendorDeals($id)
	{
		$vendor = Vendor::findOrFail($id);

		return response()->json([
			'status' => 200,
			'message' => 'Vendor deals retrieved successfully.',
			'data' => $vendor->deals,
		]);
	}

	public function checkInRange(Request $request)
	{
		$latitude = $request->input('latitude');
		$longitude = $request->input('longitude');
		$vendorId = $request->input('vendorId');

		$operatorId = Vendor::find($vendorId)->operator_id;
		$operator = OperatorMaster::find($operatorId);
		$operatorLocation = json_decode($operator->details->operation_geo_location);
		$operatorRadius = $operator->details->operation_radius;

		$distance = $this->getDistance($latitude, $longitude, $operatorLocation->latitude, $operatorLocation->longitude);

		if($distance < $operatorRadius) {
			return response()->json([
				'status' => 200,
				'message' => 'Vendor is in range.',
			]);
		} else {
			return response()->json([
				'status' => 500,
				'message' => 'Vendor is out of range.',
			]);
		}
	}

	public function getVendorItems($id)
	{
		$vendor = Vendor::findOrFail($id);

		return response()->json([
			'status' => 200,
			'message' => 'Vendor items retrieved successfully.',
			'data' => $vendor->items,
		]);
	}

	public function getVendorCategories($id)
	{
		$vendor = Vendor::findOrFail($id);

		return response()->json([
			'status' => 200,
			'message' => 'Vendor categories retrieved successfully.',
			'data' => $vendor->categories,
		]);
	}

	public function getVendorDeliveryDetails($id)
	{
		$vendor = Vendor::findOrFail($id);

		$deliveryDetails =[
			"delivery_charges" => $vendor->delivery_charges,
			"delivery_free_after" => $vendor->delivery_free_after,
			"minimum_delivery_amount" => $vendor->minimum_delivery_amount
		];

		return response()->json([
			'status' => 200,
			'message' => 'Vendor delivery details retrieved successfully.',
			'data' => $deliveryDetails
		]);
	}

	public function getVendorDetails($id)
	{
		$vendor = Vendor::findOrFail($id);

		return response()->json([
			'status' => 200,
			'message' => 'Vendor delivery details retrieved successfully.',
			'data' => $vendor
		]);
	}
}
