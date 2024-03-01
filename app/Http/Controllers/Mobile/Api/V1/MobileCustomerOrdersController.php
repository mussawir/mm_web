<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Models\OrderMaster;
use App\Models\Items_list;
use App\Models\OrderAddon;
use App\Models\OrderDealOption;
use App\Models\Vendor;
use App\Models\CustomerOperator;
use App\Models\Customer;
use App\Models\OperatorMaster;
use App\Models\OperatorDues;
use Illuminate\Support\Facades\DB;

class MobileCustomerOrdersController extends Controller
{
	public function productdetails($id)
	{
		$proddetails = Items_list::findOrFail($id);

		return response()->json([
			'status' => '200',
			'data' => $proddetails,
			'message' => 'Product Details Retrieved Successfully!'
		]);
	}
	
	public function groupdetails()
	{
		// $gropdetails = Group::get();

		// return response()->json([
		// 	'status' => '200',
		// 	'data' => $gropdetails,
		// 	'message' => 'Product Details Retrieved Successfully!'
		// ]);
	}

	public function createOrder(Request $request)
	{
		$ordermaster = new OrderMaster;

		$ordermaster->customer_id = $request->data['userobj']['customerid'];
		$ordermaster->item_quantity = $request->data['userobj']['totalQty'];
		$ordermaster->order_amount = $request->data['userobj']['orderAmount'];
		$ordermaster->delivery_charges = $request->data['userobj']['deliveryCharges'];
		$ordermaster->grand_total = $request->data['userobj']['totalAmount'];
		$ordermaster->vendor_id = $request->data['userobj']['vendorId'];
		$ordermaster->order_address = $request->data['location']['address'];
		$ordermaster->order_geo_location = json_encode($request->data['location']['selectedCoords']);
		$ordermaster->further_instructions = $request->data['location']['instructions'];
		$orderType = $request->data['userobj']['orderType'];
		$paymentMethod = $request->data['userobj']['paymentMethod'];

		$vendor = Vendor::findOrFail($request->data['userobj']['vendorId']);
		$commissionPercentage = $vendor->commission_percentage;
		$operatorId = $vendor->operator_id;
		$ordermaster->operator_id = $operatorId;
		$ordermaster->operator_commission = $commissionPercentage * ($request->data['userobj']['orderAmount']/100);


		$adminCommissionRate = OperatorMaster::where('id', $operatorId)->first();
		$adminCommissionRate = $adminCommissionRate->details->commission_percentage;
		$ordermaster->admin_commission = $adminCommissionRate * ($request->data['userobj']['orderAmount']/100);

		if ($orderType == 'Delivery')
		{
			$ordermaster->order_type = 1;
		}
		elseif ($orderType == 'Pickup')
		{
			$ordermaster->order_type = 2;
		}


		if($paymentMethod == 'cash')
		{
			$ordermaster->payment_type = 1;
		}
		elseif($paymentMethod == 'online')
		{
			$ordermaster->payment_type = 2;
		}

		$ordermaster->status = 1;
		
		$ordermaster->save();


		// saving commission which admin will get on each order in operator_dues table

		$operatorDues = new OperatorDues;
		$operatorDues->order_id = $ordermaster->id;
		$operatorDues->vendor_id = $vendor->id;
		$operatorDues->operator_id = $operatorId;
		$operatorDues->amount = $adminCommissionRate * ($request->data['userobj']['orderAmount']/100);
		$operatorDues->save();

		// update customer address in customer table with order address
		$customer = Customer::find($request->data['userobj']['customerid']);
		$customer->address = $request->data['location']['address'];
		$customer->geo_location = json_encode($request->data['location']['selectedCoords']);
		$customer->save();

		$cusOperHist = CustomerOperator::where('customer_id', $request->data['userobj']['customerid'])->where('operator_id', $operatorId)->first();
		if(!$cusOperHist){
			$cusOperHist = new CustomerOperator;
			$cusOperHist->customer_id = $request->data['userobj']['customerid'];
			$cusOperHist->operator_id = $operatorId;
			$cusOperHist->save();
		}
		
		foreach ($request->data['items'] as $record)
		{
			$order = new OrderDetails();

			$order->order_master_id = $ordermaster->id;
			$order->sub_total = $record['sub_total'];
			$order->qty = $record['qty'];
			$order->item_id = $record['id'];
			$order->item_price = $record['price'];
			$order->item_name = $record['name'];
			$order->main_image = $record['image'];
			$order->is_deal = 0;
			
			$order->save();
			
			if (count($record['addons']))
			{
				foreach ($record['addons'] as $addon)
				{
					$orderAddon = new OrderAddon;

					$orderAddon->order_master_id = $ordermaster->id;
					$orderAddon->order_detail_id = $order->id;
					$orderAddon->item_id = $record['id'];
					$orderAddon->addon_id = $addon['id'];
					$orderAddon->quantity = $addon['quantity'];
					$orderAddon->is_deal = 0;

					$orderAddon->save();
				}
			}
		}

		if ($request->data['deals'])
		{
			foreach ($request->data['deals'] as $deal)
			{
				$order = new OrderDetails();

				$order->order_master_id = $ordermaster->id;
				$order->sub_total = $deal['sub_total'];
				$order->qty = $deal['qty'];
				$order->item_id = $deal['id'];
				$order->item_price = $deal['price'];
				$order->item_name = $deal['name'];
				$order->main_image = $deal['deal_banner'];
				$order->is_deal = 1;
				
				$order->save();

				if (count($deal['addons']))
				{
					foreach ($deal['addons'] as $addon)
					{
						$orderAddon = new OrderAddon;

						$orderAddon->order_master_id = $ordermaster->id;
						$orderAddon->order_detail_id = $order->id;
						$orderAddon->item_id = $deal['id'];
						$orderAddon->addon_id = $addon['item_id'];
						$orderAddon->quantity = $addon['quantityByUser'];
						$orderAddon->is_deal = 1;

						$orderAddon->save();
					}
				}

				if ($deal['selected_options'])
				{
					foreach ($deal['selected_options'] as $dealOption)
					{
						$orderDealOption = new OrderDealOption();

						$orderDealOption->deal_id = $dealOption['deal_id'];
						$orderDealOption->order_master_id = $ordermaster->id;
						$orderDealOption->order_detail_id = $order->id;
						$orderDealOption->item_id = $dealOption['id'];
						$orderDealOption->item_name = $dealOption['item_name'];
						$orderDealOption->item_description = $dealOption['item_description'];
						$orderDealOption->item_image = $dealOption['item_image'];
						$orderDealOption->item_original_price = $dealOption['item_original_price'];
						$orderDealOption->deal_price = $dealOption['deal_price'];
						$orderDealOption->quantity = 0;

						$orderDealOption->save();
					}
				}
			}
		}

		$existingToken = DB::table('admins')
			->where('user_id', $request->data['userobj']['vendorId'])
			->value('fcm_token');

		$SERVER_API_KEY = 'AAAA67W-sfc:APA91bGirgvIyP53r0i5RZCW2kXficfBXnUmktRnQ0uVt8Ef-OjyGkC6bq3ExkjFfbEgLy2MM5RC9h6QSUwMZIgZ_5Il5ij33uOUB7UXW1mdXKwCkU33MxFwIgKiza36eKMCDvnPVne-';
		$data = [
            "registration_ids" => (array) $existingToken,
            "notification" => [
                "title" => 'Mazaa Max - New Order',
                "body" => "You have a new order",
            ]
        ];
		$dataString = json_encode($data);
		$headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                 
        $response = curl_exec($ch);
		return response()->json([
			'status' => 200,
			'data' => $request->data['userobj'],
			'message' => $response
		]);
	}
	
	

	public function showOrders($customerId)
	{
		$orders = OrderMaster::where('customer_id', $customerId)
			->whereIn('status', ['1', '2', '3', '4'])
			->latest()
			->get();

		$orderDetailsList = [];

		foreach ($orders as $order) {
			$orderDetails = OrderDetails::where('order_master_id', $order->id)
				->get();

			$orderDealOptions = OrderDealOption::where('order_master_id', $order->id)
				->get();

			$vendorDetails = Vendor::where('id', $order->vendor_id)
				->first();

			$orderDetailsList[] = [
				'items' => $this->processOrderDetails($orderDetails, $orderDealOptions, $order),
				'orderAmount' => $order->order_amount,
				'deliveryCharges' => $order->delivery_charges,
				'grandTotal' => $order->grand_total,
				'instructions' => $order->further_instructions,
				'vendorId' => $order->vendor_id,
				'vendorName' => $vendorDetails->company_name ?? '',
				'totalSubTotal' => $orderDetails->sum('sub_total'),
				'order_master_id' => $order->id,
				'totalQty' => $orderDetails->count(),
				'status' => $order->status,
				'date' => $order->created_at,
				'orderType' => $order->order_type,

			];
		}

		if (empty($orderDetailsList)) {
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

	public function customerReceivedOrder($customerId)
	{
		$orders = OrderMaster::where('customer_id', $customerId)
			->whereIn('status', [5, 6, 7])
			->orderBy('id', 'DESC')
			->latest()
			->get();

		$orderDetailsList = [];

		foreach ($orders as $order) {
			$orderDetails = OrderDetails::where('order_master_id', $order->id)
				->get();

			$vendorDetails = Vendor::where('id', $order->vendor_id)
				->first();

			$orderDealOptions = OrderDealOption::where('order_master_id', $order->id)
				->get();

			$orderDetailsList[] = [
				'items' => $this->processOrderDetails($orderDetails, $orderDealOptions, $order),
				'orderAmount' => $order->order_amount,
				'deliveryCharges' => $order->delivery_charges,
				'grandTotal' => $order->grand_total,
				'instructions' => $order->further_instructions,
				'vendorId' => $order->vendor_id,
				'vendorName' => $vendorDetails->company_name ?? '',
				'totalSubTotal' => $orderDetails->sum('sub_total'),
				'order_master_id' => $order->id,
				'totalQty' => $orderDetails->count(),
				'status' => $order->status,
				'date' => $order->created_at,
				'orderType' => $order->order_type,
				'cancelationReason' => $order->cancelation_reason,
				'canceledTime' => $order->cancelation_time,
			];
		}

		if (empty($orderDetailsList)) {
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

	public function edit($id)
	{
		//
	}

	public function update(Request $request, $id)
	{
		//  return response()->json($request->all());
		$updateOrder = OrderMaster::FindOrFail($id);
		//  return response()->json($updateOrder);

		foreach ($request->input('body') as $record)
		{
			$Order = new OrderMaster();
			$Order->item_id = $record['id'];
			$Order->total_price = $record['sum'];
			$Order->order_master_id = $updateOrder->id;
			$Order->customer_id = $updateOrder->customer_id;
			$Order->shop_id = $record['shopId'];
			$Order->qty = $record['qty'];
			$Order->save();
		}
		return response()->json([
			'status' => '200',
			'data' => $Order->id,
			'message' => 'Order created succesfully!'
		]);
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