<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\DealMaster;
use App\Models\Items_list;
use App\Models\OperatorMaster;
use App\Models\Vendor;

class FrontController extends Controller
{
	public function index()
	{
		// $selectedBranch = (int) session('selectedBranch') ?? 0;

		// // $vendorTypes = VendorType::where('status', 1)->get();

		// $vendors = Vendor::where('branch_id', $selectedBranch)
		// 	->with('vendorType')
		// 	->latest()
		// 	->get();


		// Users location coordinates
		// $latitude = $request->input('latitude');
		// $longitude = $request->input('longitude');

		// user selected vendor type
		// $vendorType = $request->input('vendorType');

		// fetching all operators
		$operators = OperatorMaster::with('details')->get();

		// Filtering operators based on distance
		$filteredOperators=[];

		// foreach($operators as $operator) {
		// 	$operatorLocation = json_decode($operator->details->operation_geo_location);
		// 	$operatorRadius = $operator->details->operation_radius;
		// 	if($operatorLocation && $operatorRadius){
		// 		$distance = $this->getDistance($latitude, $longitude, $operatorLocation->latitude, $operatorLocation->longitude);
		// 		if($distance > $operatorRadius){
		// 			continue;
		// 		}
		// 		$operator->distance = $distance;
		// 		$filteredOperators[] = $operator;
		// 	}
		// }

		// Extracting operator IDs from the filteredOperators array
		$operatorIds = array_column($filteredOperators, 'id');
		$vendors = [];
		// fetching vendors based on operator ids and vendor type
		// $vendors = Vendor::whereIn('operator_id', $operatorIds)->where('vendor_type_id', $vendorType)->get();

		// return response()->json([
		// 	'status' => 200,
		// 	'message' => 'Vendors retrieved successfully.',
		// 	'data' => $vendors,
		// 	'operators' => $filteredOperators
		// ]);

		return view('home', compact('vendors', 'filteredOperators'));
	}

	public function vendorDetail(Request $request, $id)
	{
		$title = 'Vendor Detail - Order Delivery';

		$vendor = Vendor::findOrFail($id);

		$categories = Category::with(['items' => function ($query) use ($id) {
				$query->where('is_addon', 0)->where('vendor_id', $id);
			}])
			->orderBy('sort_by')
			->get();

		$activeCategories = $categories->filter(function ($value) {
			return $value->items->count() > 0;
		});

		$deals = DealMaster::where('status', 1)
			->where('vendor_id', $id)
			->latest()
			->take(12)
			->get();

		return view('front.vendor-detail', compact('title', 'vendor', 'deals', 'activeCategories'));
	}

	public function itemDetail($vendorId, $id)
	{
		$item = Items_list::with(['category', 'addons'])
			->findorFail($id);

		return response()->json([
			'status'=> 200,
			'vendorId' => $vendorId,
			'item' => $item,
			'message'=>'Item found!'
		]);
	}

	public function dealDetail($vendorId, $id)
	{
		$deal = DealMaster::where('status', 1)
			->with('items.item', 'items.dealOptions.item', 'addons')
			->findOrFail($id);
		
		return response()->json([
			'status' => 200,
			'vendorId' => $vendorId,
			'deal' => $deal,
			'message'=>'Deal found!'
		]);
	}

	public function loadDealsAndCategories($branch)
	{
		$categories = Category::where('branch_id' , $branch)
			->with(['items' => function ($query) {
				$query->where('is_addon', 0);
			}])
			->orderBy('sort_by')
			->get();

		$activeCategories = $categories->filter(function ($value) {
			return $value->items->count() > 0;
		})->values();

		$deals = DealMaster::where('status', 1)
			->where('branch_id', $branch)
			->latest()
			->take(12)
			->get();

		return response()->json([
			'deals' => $deals,
			'categories' => $activeCategories,
		]);
	}

	public function loadVendors(Request $request)
	{
		$locationCoords = json_decode($request->get('locationCoords'));
		$latitude = $locationCoords->lat;
		$longitude = $locationCoords->long;

		// user selected vendor type
		// $vendorType = $request->input('vendorType');

		$operators = OperatorMaster::with('details')->get();

		// Filtering operators based on distance
		$filteredOperators=[];

		foreach($operators as $operator) {
			$operatorLocation = json_decode($operator->details->operation_geo_location);
			$operatorRadius = $operator->details->operation_radius;

			if($operatorLocation && $operatorRadius) {
				$distance = $this->getDistance($latitude, $longitude, $operatorLocation->latitude, $operatorLocation->longitude);

				if($distance > $operatorRadius) {
					continue;
				}

				// $operator->distance = $distance;
				$filteredOperators[] = $operator;
			}
		}

		$operatorIds = array_column($filteredOperators, 'id');

		$vendors = Vendor::whereIn('operator_id', $operatorIds)
			->with('vendorType')
			->get();

		return response()->json([
			'status' => 200,
			'message' => 'Vendors retrieved successfully.',
			'vendors' => $vendors,
		]);
	}

	public function saveSelectedBranch(Request $request)
	{
		$selectedBranch = $request->input('selectedBranch');

		// Store the selected branch in the session
		$request->session()->put('selectedBranch', $selectedBranch);

		return response()->json([
			'status' => 200,
			'data' => true,
			'message' => 'Selected branch saved to session.'
		]);
	}

	private function getDistance($lat1, $lon1, $lat2, $lon2) {
		$earthRadius = 6371; // In Kilometers

		$dLat = deg2rad($lat2 - $lat1);
		$dLon = deg2rad($lon2 - $lon1);

		$a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
		$c = 2 * atan2(sqrt($a), sqrt(1 - $a));

		$distance = $earthRadius * $c;

		return $distance;
	}
}