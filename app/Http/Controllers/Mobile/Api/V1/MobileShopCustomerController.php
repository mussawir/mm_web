<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FavouriteVendor;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;

class MobileShopCustomerController extends Controller
{

	public function addToFavourite(Request $request)
	{
		$vendorId = $request->input('vendor_id');
		$customerId = $request->input('customer_id');

		$checkFavourite = FavouriteVendor::where('customer_id', $customerId)->where('vendor_id', $vendorId)->first();
		if ($checkFavourite) {
			$checkFavourite->delete();
			return response()->json(['status' => 200, 'message' => 'Removed from favourite.']);
		} else {
			$createFavourite = new FavouriteVendor;
			$createFavourite->customer_id = $customerId;
			$createFavourite->vendor_id = $vendorId;
			$createFavourite->save();
			return response()->json(['status' => 200, 'message' => 'Added to favourite.']);
		}
	}

	public function checkFavourite(Request $request)
	{
		$vendorId = $request->input('vendor_id');
		$customerId = $request->input('customer_id');
		$checkFavourite = FavouriteVendor::where('customer_id', $customerId)->where('vendor_id', $vendorId)->first();
		if ($checkFavourite) {
			return response()->json(['status' => 200, 'data' => ['isFavourite' => true], 'message' => 'Added to favourite.']);
		} else {
			return response()->json(['status' => 200, 'data' => ['isFavourite' => false], 'message' => 'Not added to favourite.']);
		}
	}

	public function favouriteVendorsList(Request $request)
	{
		$customerId = $request->input('customer_id');
		$favouriteVendors = FavouriteVendor::where('customer_id', $customerId)->get();
		$favouriteVendorsIds = $favouriteVendors->pluck('vendor_id')->toArray();
		return response()->json(['status' => 200, 'data' => $favouriteVendorsIds]);
	}

	public function index()
	{}

	public function create()
	{}

	public function store(Request $request)
	{}

	public function show($id)
	{}

	public function edit($id)
	{}

	public function update(Request $request, $id)
	{}

	public function destroy($id)
	{}
}
