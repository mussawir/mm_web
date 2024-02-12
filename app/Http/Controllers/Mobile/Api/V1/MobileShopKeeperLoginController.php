<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MobileShopKeeperLoginController extends Controller
{
	public function login(Request $request)
	{
		if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
		{
			$user = Auth::guard('admin')->user();
			return response()->json([
				'status'=>200,
				'data' => $user,
				'message'=>'User login successfully!'
			]);
		}
		else
		{
			return response()->json(['data'=>'Unauthorized'], 404);
		}
	}

	public function vendorLogin(Request $request)
	{
		if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
		{
			$user = Auth::guard('admin')->user();

			if ($user->role == 2) {
				return response()->json([
					'status' => 200,
					'data' => $user,
					'message' => 'User login successfully!'
				]);
			} else {
				Auth::guard('admin')->logout();
				return response()->json(['data' => 'Unauthorized'], 403);
			}
		}
		else
		{
			return response()->json(['data'=>'Unauthorized'], 404);
		}
	}

	
	public function index()
	{
		$shops = Shop::get();

		return response()->json([
			'status' => 200,
			'data' => $shops,
			'message' => 'Shops Retrieved Successfully!'
		]);
	}
	
	public function stopDelievry($shop_id)
	{
		$stopdelivery = Shop::where('id', $shop_id)
			->update(['is_delivery'=>0]);
		
		return response()->json([
			'status' => 200,
			'data' =>$stopdelivery,
			'message' => 'Stop Delievring Successfully!'
		]);
	}
	
	public function startDelivery($shop_id)
	{
		$startdelivery = Shop::where('id', $shop_id)
			->update(['is_delivery'=>1]);

		return response()->json([
			'status' => 200,
			'data' => $startdelivery,
			'message' => 'Start Delievring Successfully!'
		]);
	}
	
	public function pointShop($shop_id)
	{
		$pointshop = Shop::where('id', $shop_id)
			->get();

		return response()->json([
			'status' => 200,
			'data' => $pointshop,
			'message' => 'Point Delivering Successfully!'
		]);
	}

	public function updateFCMToken(Request $request) {
		$id = $request->input('id');
		$fcmToken = $request->input('fcm_token');
	
		$existingToken = DB::table('admins')
			->where('vendor_id', $id)
			->value('fcm_token');
	
		if ($fcmToken === $existingToken) {
			return response()->json([
				'status' => 200,
				'message' => 'FCM Token is the same; no update needed.'
			]);
		}
	
		$affectedRows = DB::table('admins')
			->where('vendor_id', $id)
			->update(['fcm_token' => $fcmToken]);
	
		if ($affectedRows > 0) {
			return response()->json([
				'status' => 200,
				'message' => 'FCM Token updated successfully.'
			]);
		} else {
			return response()->json([
				'status' => 404,
				'message' => 'FCM Token not updated.'
			], 404);
		}
	}
	

	public function create()
	{
		//
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
