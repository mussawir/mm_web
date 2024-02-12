<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Vendor;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderMaster;
use App\Models\VendorType;


class MobileRiderController extends Controller
{
	public function index(){}

	public function riderLogin(Request $request) {

		if(Auth::guard('rider')->attempt(['phone_number' => $request->phone, 'password' => $request->password]))
		{
			$user = Auth::guard('rider')->user();
			return response()->json([
				'status'=>200,
				'data' => $user,
				'message'=>'Rider login successfully!'
			]);
		}
		else
		{
			return response()->json(['data'=>'Unauthorized'], 404);
		}

	}

	public function getOrderList($riderId) {

		$orders = [];

		$orders = OrderMaster::where('rider_id', $riderId)
		->where('status', 4)
		->get();

		if($orders->count() == 0) {
			$orders = OrderMaster::where('order_type', 1)
			->where('status',3)
			->orderBy('id', 'DESC')
			->latest()
			->get();
		}

		if($orders->count() == 0)
		{
			return response()->json([
				'status'=>200,
				'data' => [],
				'message'=>'No data found!'
			]);
		}

		$ordersWithDetails = [];

		foreach ($orders as $order) {
			$vendorDetails= Vendor::where('id', $order->vendor_id)
			->first();

			$customerDetails = Customer::where('id', $order->customer_id)
			->first();

			$vendorType = VendorType::where('id', $vendorDetails->vendor_type_id)
			->first();


			$ordersWithDetails[] = [
				'order'=>$order,
				'vendor'=>[
					'name'=>$vendorDetails->company_name,
					'phone'=>$vendorDetails->contact_number_primary,
					'address'=>$vendorDetails->full_address,
					'logo'=>$vendorDetails->logo,
					'vendor_type'=>$vendorType->type_name,
					'geo_location'=>'{"latitude":24.835857,"longitude":67.036867}',
				],
				'customer'=>[
					'name'=>$customerDetails->name,
					'phone'=>$customerDetails->phone_number,
				]
			];

		}
		

		return response()->json([
			'status'=>200,
			'data' => $ordersWithDetails,
			'message'=>'Order list fetched successfully!'
			
		]);
		
	}

	public function orderPicked($orderId,$riderId) {

		$order = OrderMaster::find($orderId);

		if($order->status != 3){
			return response()->json([
				'status'=>200,
				'data' => [],
				'message'=>'Order already picked by someone!'
			]);
		}

		$order->status = 4;
		$order->pickup_time = date('Y-m-d H:i:s');
		$order->rider_id = $riderId;
		$order->save();

		$delivery = new Delivery();

		return response()->json([
			'status'=>200,
			'data' => [],
			'message'=>'Order picked successfully!'
		]);
		
	}

	public function orderDelivered($id) {

		$order = OrderMaster::find($id);

		if($order->status != 4){
			return response()->json([
				'status'=>200,
				'data' => [],
				'message'=>'Order already delivered!'
			]);
		}

		$order->status = 5;
		$order->drop_off_time = date('Y-m-d H:i:s');
		$order->save();

		return response()->json([
			'status'=>200,
			'data' => [],
			'message'=>'Order delivered successfully!'
		]);
	}

	public function orderReturned(Request $request) {

		$order = OrderMaster::find($request->order_id);
		if(!$order) {
			return response()->json([
				'status'=>200,
				'data' => [],
				'message'=>'Order not found!'
			]);
		}

		$order->status = 8;
		$order->order_canceled = date('Y-m-d H:i:s');
		$order->cancelation_reason = $request->reason;
		$order->save();

		return response()->json([
			'status'=>200,
			'data' => [],
			'message'=>'Order returned successfully!'
		]);
	}


	public function orderDeliveredList($riderId) {
		$orders = OrderMaster::where('rider_id', $riderId)
		->where('status', 5)
		->get();

		if($orders->count() == 0){
			return response()->json([
				'status'=>200,
				'data' => [],
				'message'=>'No data found!'
			]);
		}
		$ordersWithDetails = [];

		foreach ($orders as $order) {
			$vendorDetails= Vendor::where('id', $order->vendor_id)
			->first();

			$customerDetails = Customer::where('id', $order->customer_id)
			->first();

			$vendorType = VendorType::where('id', $vendorDetails->vendor_type_id)
			->first();


			$ordersWithDetails[] = [
				'order'=>$order,
				'vendor'=>[
					'name'=>$vendorDetails->company_name,
					'phone'=>$vendorDetails->contact_number_primary,
					'address'=>$vendorDetails->full_address,
					'logo'=>$vendorDetails->logo,
					'vendor_type'=>$vendorType->type_name,
					'geo_location'=>'{"latitude":24.835857,"longitude":67.036867}',
				],
				'customer'=>[
					'name'=>$customerDetails->name,
					'phone'=>$customerDetails->phone_number,
				]
			];
		}
		return response()->json([
			'status'=>200,
			'data' => $ordersWithDetails,
			'message'=>'Order list fetched successfully!'
		]);
	}



	public function orderReturnShow($riderId) {

		$orders = OrderMaster::where('rider_id', $riderId)
		->where('status', 8)
		->get();

		if($orders->count() == 0){
			return response()->json([
				'status'=>200,
				'data' => [],
				'message'=>'No data found!'
			]);
		}

		$ordersWithDetails = [];

		foreach ($orders as $order) {
			$vendorDetails= Vendor::where('id', $order->vendor_id)
			->first();

			$customerDetails = Customer::where('id', $order->customer_id)
			->first();

			$vendorType = VendorType::where('id', $vendorDetails->vendor_type_id)
			->first();

			$ordersWithDetails[] = [
				'order'=>$order,
				'vendor'=>[
					'name'=>$vendorDetails->company_name,
					'phone'=>$vendorDetails->contact_number_primary,
					'address'=>$vendorDetails->full_address,
					'logo'=>$vendorDetails->logo,
					'vendor_type'=>$vendorType->type_name,
					'geo_location'=>'{"latitude":24.835857,"longitude":67.036867}',
				],
				'customer'=>[
					'name'=>$customerDetails->name,
					'phone'=>$customerDetails->phone_number,
				]
			];
		}

		return response()->json([
			'status'=>200,
			'data' => $ordersWithDetails,
			'message'=>'Order list fetched successfully!'
		]);
	}

	public function riderReg() {}
}