<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderMaster;
use App\Models\OrderDetails;
use App\Models\OrderDealOption;
use App\Models\OrderAddon;
use Illuminate\Support\Facades\DB;

class MobileShopkeerOrdersListController extends Controller
{

	public function orderDelivered($id)
	{
		// $orderdelivered = OrderMaster::where('shop_id', $id)
		// 	->where('status', 3)
		// 	->get();
		
		$orders = OrderMaster::where('branch_id', $id)
			->whereIn('status', [3, 4, 5])
			->orderBy('id', 'DESC')
			->latest()
			->get();
		
		$orderDetailsList = [];

		foreach ($orders as $order) {
			$orderDetails = OrderDetails::where('order_master_id', $order->id)->get();
			$orderDealOptions = OrderDealOption::where('order_master_id', $order->id)->get();
			$orderDetailsList[] = [
				'items' => $this->processOrderDetails($orderDetails, $orderDealOptions, $order),
				'totalSubTotal' => $orderDetails->sum('sub_total'),
				'order_master_id' => $order->id,
				'totalQty' => $orderDetails->count(),
				'status' => $order->status,
				'date' => $order->created_at,
			];

		}
		if(empty($orderDetailsList))
		{
			return response()->json([
				'status' => 200,
				'data' => [],
				'message' => 'No orders found for the customer.',
			]);
		}

		return response()->json([
			'status' => 200,
			'data' => $orderDetailsList,
			'message' => 'Orders list retrieved successfully!',
		]);


		
	}

	public function getreadyord($id)
	{
		$getready = DB::table('order_master')
			->join('shops', 'shops.id', '=', 'order_master.shop_id')
			->select('shops.*', 'order_master.*')
			->where('shop_id', $id)
			->get();

		return response()->json([
			'status' => '200',
			'data' => $getready,
			'message' => 'Ready orders retrieved successfully!'
		]);
	}
	
	// public function verified_subarea()
	// {
	// 	$checking_order = DB::table("riders")
	// 		->join('shops', 'shops.id', '=', 'riders.id')
	// 		->select('shops.*', 'riders.*')
	// 		->get();
			
	// 	return response()->json([
	// 		'status' => '200',
	// 		'data' => $checking_order,
	// 		'message' => 'Order checking successfully!'
	// 	]);
	// }

	public function orderDeliverToRider(Request $request)
	{
		// We have shop id now we should get shop city, area, sub area for searching
		// $deliver_order = new Rider_order();
		// $deliver_order->shop_id = $request->order_master_shopId;
		// $deliver_order->rider_id = $request->order_rider_id;
		// $deliver_order->order_master_id = $request->order_master_id;
		// $deliver_order->total_price = $request->order_master_price;
		// $deliver_order->save();
		
		// $update_ready_status = OrderMaster::where('id','=', $request->order_master_id)->update(['status'=>1]);

		$orderMaster = OrderMaster::find($request->order_master_id);
		$orderMaster->status = 3;
		
		$orderMaster->save();
		
		return response()->json([
			'status' => '200',
			'data' => [],
			'message' => 'Order Delivered Succcesfully!',
		]);
	}

	public function orderPickup(Request $request)
	{
		$orderMaster = OrderMaster::findorFail($request->order_master_id);
		$orderMaster->status = 4;
		
		$orderMaster->save();
		
		return response()->json([
			'status' => '200',
			'data' => [],
			'message' => 'Order Picked up successfully.',
		]);
	}
	
	public function orderCancel(Request $request)
	{
		$orderMaster = OrderMaster::find($request->order_master_id);
		$orderMaster->status = 7;
		$orderMaster->order_canceled = date('Y-m-d H:i:s');
		$orderMaster->cancelation_reason = $request->cancel_reason;
		$orderMaster->save();
		
		return response()->json([
			'status' => '200',
			'data' => [],
			'message' => 'Order Canceled Succcesfully!',
		]);
	}
	public function orderStatusChange($id, $status)
	{
		$orderMaster = OrderMaster::find($id);
		$orderMaster->status = $status;
		if($status == 2)
		{
			$orderMaster->order_confirmed = date('Y-m-d H:i:s');
		}
		if($status == 3)
		{
			$orderMaster->order_prepared = date('Y-m-d H:i:s');
		}
		
		
		$orderMaster->save();
		
		return response()->json([
			'status' => '200',
			'data' => [],
			'message' => 'Order Status Changed Succcesfully!',
		]);
	}
	
	
	public function show($id,$status)
	{
		// $Orders = OrderMaster::where('shop_id','=', $id)->where('is_market','=',0)->where('status','=',0)->orderBy('id', 'DESC')->get();
		// return response()->json(['status' => 200,'data' => $Orders,'message' => 'Orders Retrieve SucessFully!.' ]);

		// $getOrdersShop = DB::table('order_master')
		// ->join('shops', 'shops.id', '=', 'order_master.shop_id')
		// ->join('customers', 'customers.id', '=', 'order_master.customer_id')
		// ->join('riders', 'riders.id', '=', 'order_master.customer_id')
		// ->select('shops.id', 'customers.*', 'riders.*', 'order_master.*')->where('shop_id','=', $id)->get();
		

		// if status getting from api call is 5 which represent completed, it will return both delivered and completed pickup orders
		$getBranchOrders = DB::table('order_master')
			->join('customers', 'customers.id', '=', 'order_master.customer_id')
			->select('customers.*', 'order_master.*')
			->where('vendor_id', $id)
			->whereIn('status', $status == 5 ? [5,6] : [$status])
			->get();
		
		return response()->json([
			'status' => 200,
			'data' => $getBranchOrders,
			'message' => 'Orders Retrieved Successfully!',
		]);
	}
	
	public function getOrdersDetail($id)
	{
		$orderDetails = OrderDetails::where('order_master_id', $id)
			->get();

		$orderMasterDetails = OrderMaster::where('id', $id)
			->first();

		
		if ($orderDetails->isEmpty()) {
			return response()->json([], 404);
		}
		
		$orderDetailsArray = [];

		foreach ($orderDetails as $orderDetail)
		{
			$orderDealOptions = [];
			if ($orderDetail->is_deal)
			{
				foreach ($orderDetail->orderDealOptions as $orderDealOption)
				{
					$orderDealOptions[] = [
						'id' => $orderDealOption->id,
						'item_id' => $orderDealOption->item_id,
						'item_name' => $orderDealOption->item_name,
						'item_description' => $orderDealOption->item_description,
						'item_image' => $orderDealOption->item_image,
						'item_original_price' => $orderDealOption->item_original_price,
						'deal_price' => $orderDealOption->deal_price,
					];
				}
			}

			$orderAddonsArray = [];

			foreach ($orderDetail->orderAddons as $orderAddon)
			{
				$orderAddonsArray[] = [
					'id' => $orderAddon->addonItem->id,
					'name' => $orderAddon->addonItem->name,
					'description' => $orderAddon->addonItem->discription,
					'price' => $orderAddon->addonItem->price,
					'main_image' => $orderAddon->addonItem->main_image,
					'quantity' => $orderAddon->quantity,
				];
			}

			$orderDetailsArray['orderDetails'][] = [
				'id' => $orderDetail->id,
				'sub_total' => $orderDetail->sub_total,
				'quantity' => $orderDetail->qty,
				'item_id' => $orderDetail->item_id,
				'item_name' => $orderDetail->item_name,
				'image' => $orderDetail->main_image,
				'price' => $orderDetail->item_price,
				'is_deal' => $orderDetail->is_deal,
				'orderDealOptions' => $orderDealOptions,
				'orderAddons' => $orderAddonsArray,
			];
		}

		$customer = $orderDetails->first()->orderMaster->customer->name ?? '';
		$customerPhone = $orderDetails->first()->orderMaster->customer->phone_number ?? '';
		$orderDate = $orderDetails->first()->orderMaster->created_at->format('M d Y');
		$grandTotal = $orderDetails->first()->orderMaster->grand_total;
		$orderType = $orderDetails->first()->orderMaster->order_type;
		$vendorId = $orderDetails->first()->orderMaster->vendor_id;
		$vendorName = $orderDetails->first()->orderMaster->vendor->name;
		
		$orderDetailsArray['orderInfo'] = [
			'customer' => $customer,
			'phoneNumber' => $customerPhone,
			'orderDate' => $orderDate,
			'grandTotal' => $grandTotal,
			'orderType' => $orderType,
			'vendorId' => $vendorId,
			'vendorName' => $vendorName
		];

		$orderDetailsArray['orderMaster'] = $orderMasterDetails;

		return response()->json([
			'status' => 200,
			'data' => $orderDetailsArray,
			'message' => 'Order Details Retrieved Successfully'
		]);
	}
	
	public function orderDelivers(Request $request)
	{
		// Code here
	}

	public function destroy($id)
	{
		//
	}


	protected function processOrderDetails($orderDetails, $orderDealOptions, $order)
	{
		return $orderDetails->map(function ($orderDetail) use ($orderDealOptions, $order) {
			$orderAddons = OrderAddon::where('order_master_id', $order->id)
				->where('order_detail_id', $orderDetail->id)
				->get();

			// dd (isset($orderAddons->addonItem));
			$addonsList = $orderAddons->map(function ($orderAddon) {
				return [
					'id' => $orderAddon->addonItem->id,
					'name' => $orderAddon->addonItem->name,
					'description' => $orderAddon->addonItem->discription,
					'price' => $orderAddon->addonItem->price,
					'image' => $orderAddon->addonItem->main_image,
					'quantity' => $orderAddon->quantity,
					'isDeal' => $orderAddon->is_deal,
				];
			});

			if ($orderDetail->is_deal) {
				$dealOptions = $orderDealOptions->where('order_detail_id', $orderDetail->id);

				$orderDetail['dealOptions'] = $dealOptions->map(function ($dealOption) {
					return [
						'id' => $dealOption->item_id,
						'item_name' => $dealOption->item_name,
						'item_description' => $dealOption->item_description,
						'item_image' => $dealOption->item_image,
						'item_original_price' => $dealOption->item_original_price,
						'deal_price' => $dealOption->deal_price,
						'quantity' => $dealOption->quantity,
					];
				});
			}

			$orderDetail['addons'] = $addonsList->all();

			return $orderDetail;
		});
	}
}
