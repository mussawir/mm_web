<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Http\Request;

class MobileVendorController extends Controller
{
	public function index($branchID,$vendorType)
	{
		$vendors = Vendor::where('branch_id', $branchID)->where('vendor_type_id', $vendorType)->get();

		return response()->json([
			'status' => 200,
			'message' => 'Vendors retrieved successfully.',
			'data' => $vendors,
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

	public function getVendorTypes($isFood)
	{
		// using 1 for food types 0 for general and 2 for fetching both
		if($isFood == '2'){
			$types = VendorType::get();
		}else{
			$types = VendorType::where('is_food', $isFood)->get();
		}
		

		return response()->json([
			'status' => 200,
			'message' => 'Vendor types retrieved successfully.',
			'data' => $types,
		]);
	}
}
