<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;

class MobileShopKeeperRegistrationController extends Controller
{
	public function verified_Shopkeeper($id)
	{
		$getverified = Shop::where('id', $id)
			->update(['verified_Shopkepper'=> 1]);

		return response()->json([
			'status' => 200,
			'data' => $getverified,
			'message' => 'Shopkeeper verified successfully!'
		]);
	}
	
	// public function shopRegistration(Request $request)
	// {
	// 	$shopkeeper = Shop::where('phone_number', $request->phonenumber)
	// 		->get();
	// 	$object = json_decode(json_encode($shopkeeper), FALSE);
		
	// 	if($object == [])
	// 	{
	// 		$createshop = new Shop;
	// 		$createshop->phone_number = $request->input('phonenumber');
	// 		$createshop->shop_onwer = $request->input('shop_onwer');
	// 		$createshop->shop_name = $request->input('shop_name');
	// 		$createshop->geo_location = $request->input('geo_location');
	// 		$createshop->city = $request->input('city');
	// 		$createshop->area = $request->input('area');
	// 		$createshop->sub_area = $request->input('sub_area');
	// 		$createshop->address = $request->input('address');
	// 		$createshop->save();

	// 		return response()->json([
	// 			'status' => 200,
	// 			'data' => $createshop,
	// 			'message' => 'Shopkeeper registered successfully!'
	// 		]);
	// 	}
	// 	else
	// 	{
	// 		return response()->json([
	// 			'status' => 100,
	// 			'data' => $shopkeeper,
	// 			'message' => 'You are already registered!'
	// 		]);
	// 	}
	// }

	public function create(Request $request)
	{
		$shopkeeper = Shop::where('phone_number', $request->phonenumber)
			->get();
		$object = json_decode(json_encode($shopkeeper), FALSE);
		
		if($object == [])
		{
			$digits = 4;
			$random_unique_no = rand(pow(10, $digits-1), pow(10, $digits)-1);
			$create_shop = new Shop;
			$create_shop->shop_owner = $request->input('shop_owner');
			$create_shop->shop_name = $request->input('shop_name');
			$create_shop->address = $request->input('address');
			$create_shop->city = $request->input('city');
			$create_shop->phone_number = $request->input('phonenumber');
			$create_shop->area = $request->input('area');
			$create_shop->sub_area = $request->input('sub_area');
			$create_shop->geo_location = $request->input('geo_location');
			$create_shop->pin = $random_unique_no;
			$create_shop->save();
			return response()->json([
				'status' => 200,
				'data' => $create_shop,
				'message' => 'Shopkeeper registered successfully!'
			]);
		}
		else{
			return response()->json([
				'status' => 100,
				'data' => $shopkeeper,
				'message' => 'You are already registered!'
			]);
		}
	}

	public function store(Request $request)
	{
		//
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update(Request $request, $id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}
}
