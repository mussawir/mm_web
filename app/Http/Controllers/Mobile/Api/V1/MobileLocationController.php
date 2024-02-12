<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Branches;
use App\Models\City;

class MobileLocationController extends Controller
{
	// public function index()
	// {
	// 	$locations = ServiceLocations::get();

	// 	return response()->json([
	// 		'status' => 200,
	// 		'data' => $locations,
	// 		'message' => 'All locations retrieved successfully!'
	// 	]);
	// }
	
	// public function current($country,$state, $city, $neighbourhood)
	// {
	// 	$current = ServiceLocations::where('country', $country)
	// 		->where('state', $state)
	// 		->where('city', $city)
	// 		->where('neighbourhood', $neighbourhood)
	// 		->get();
		 
	// 	if(count($current) > 0)
	// 	{
	// 		return response()->json([
	// 			'status' => 200,
	// 			'data' => $current,
	// 			'message' => 'Found!'
	// 		]);
	// 	}
	// 	else
	// 	{
	// 		return response()->json([
	// 			'status' => 404,
	// 			'data' => $current,
	// 			'message' => 'Empty'
	// 		]);
	// 	}
	// }

	// public function getLocation()
	// {
	// 	$getLocation = ServiceLocations::where('id', '2')->first();

	// 	return response()->json([
	// 		'status' => 200,
	// 		'data' => $getLocation,
	// 		'message' => 'Location fetched succuessfully!'
	// 	]);
	// }

	public function fetchCityBranches($city)
	{
		$cityBranches = Branches::where('deleted', 0)
			->where('city_id', $city)
			->get();

		if ($cityBranches)
		{
			return response()->json([
				'status' => 200,
				'data' => $cityBranches,
				'message' => 'City branches list fetched successfully.'
			]);
		}
		else
		{
			return response()->json([]);
		}
	}

	public function cityBranchCount()
	{
		$cityCount = City::all()->count();
		
		$branchCount = Branches::where('deleted', 0)
			->get()
			->count();

		return response()->json([
			'status' => 200,
			'data' => [
				'cityCount' => $cityCount,
				'branchCount' => $branchCount,
			],
			'message' => 'City and branch count fetched successfully.'
		]);
	}
}