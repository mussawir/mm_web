<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CartAddon;
use App\Models\CartDealOption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\OrderMaster;
use App\Models\OrderDetails;
use App\Models\CartMaster;
use App\Models\CartDetail;
use App\Models\CustomerOperator;
use App\Models\Items_list;
use App\Models\OperatorDues;
use App\Models\OperatorMaster;
use App\Models\OrderAddon;
use App\Models\OrderDealOption;
use App\Models\Vendor;

class CheckoutController extends Controller
{
	public function index(Request $request)
	{
		$selectedCoords = session('selectedCoords') ?? null;
		
		$latitude = $selectedCoords->lat ?? 0;
		$longitude = $selectedCoords->long ?? 0;

		// Check if the user is already logged in
		if (Auth::guard('customer')->check()) {
			$vendorID = session('vendor');
			$vendor = Vendor::findOrFail($vendorID);

			$ip = $request->ip();
			$cart = CartMaster::where('ip_address', $ip)->first();

			if ($cart->grand_total == 0) {
				return redirect()
					->route('vendor.detail', [$vendor->id])
					->with('success', 'No items in cart!');
			}

			// Minimum order check
			$minimumOrderCheck = ($cart->grand_total >= $vendor->minimum_delivery_amount) ? true : false;

			$minimumOrderAmount = $vendor->minimum_delivery_amount;
			$deliveryFreeAfer = $vendor->delivery_free_after;

			// Free delivery calculation
			$deliveryCharges = ($cart->grand_total >= $vendor->delivery_free_after) ? 0 : $vendor->delivery_charges;

			return view('front.checkout', compact('deliveryCharges', 'minimumOrderCheck', 'minimumOrderAmount', 'deliveryFreeAfer', 'latitude', 'longitude'));
		}
		else {
			return redirect()->route('customer.login');
		}
	}

	public function checkout(Request $request)
	{
		$orderType = $request->input('order_type');

		if ($orderType == 'delivery') {
			$request->validate([
				'user_address' => 'required|string',
			]);
		}

		if (count(session('cart', []))) {
			$ip = $request->ip();
			$vendor = Vendor::findOrFail(session('vendor'));
			$paymentType = $request->input('payment_method');
			$orderAddress = $request->input('user_address');
			$deliveryCharges = $request->input('delivery_charges');

			$latitude = floatval($request->input('address_latitude'));
			$longitude = floatval($request->input('address_longitude'));
			$selectedCoords = json_encode(['latitude' => $latitude, 'longitude' => $longitude]);

			$cart = CartMaster::where('ip_address', $ip)->first();

			if ($cart->count())
			{
				$cartDetail = $cart->cartItems;

				$order = new OrderMaster;

				$order->operator_id = $vendor->operator_id;
				$order->vendor_id = $vendor->id;
				$order->customer_id = Auth::guard('customer')->user()->id ?? null;
				$order->order_address = $orderAddress;
				$order->order_geo_location = $selectedCoords;
				$order->further_instructions = $request->input('instructions');
				$order->item_quantity = $cart->item_quantity;
				$order->order_amount = $cart->grand_total;
				$order->delivery_charges = $deliveryCharges;
				$order->grand_total = ($cart->grand_total + $deliveryCharges);
				$order->operator_commission = $vendor->commission_percentage * ($cart->grand_total / 100);
				
				$operatorRecord = OperatorMaster::where('id', $vendor->operator_id)->first();
				$adminCommissionRate = $operatorRecord->details->commission_percentage;
				$order->admin_commission = $adminCommissionRate * ($cart->grand_total / 100);

				if ($orderType == 'delivery') {
					$order->order_type = 1;
				} elseif ($orderType == 'pickup') {
					$order->order_type = 2;
				}

				if ($paymentType == 'cash') {
					$order->payment_type = 1;
				} elseif ($paymentType == 'online') {
					$order->payment_type = 2;
				}
				$order->status = 1;

				$order->save();

				$operatorDues = new OperatorDues;

				$operatorDues->order_id = $order->id;
				$operatorDues->vendor_id = $vendor->id;
				$operatorDues->operator_id = $vendor->operator_id;
				$operatorDues->amount = $adminCommissionRate * ($cart->grand_total / 100);

				$operatorDues->save();

				$this->saveUserInfo($orderAddress, $selectedCoords);

				$customerOperatorHistory = CustomerOperator::where('customer_id', $order->customer_id)
					->where('operator_id', $vendor->operator_id)
					->first();

				if (! $customerOperatorHistory) {
					$cusOperHist = new CustomerOperator;
					$cusOperHist->customer_id = $order->customer_id;
					$cusOperHist->operator_id = $vendor->operator_id;

					$cusOperHist->save();
				}
			}

			$itemsArray = [];
			
			foreach($cartDetail as $cartItem)
			{
				$orderDetail = new OrderDetails;

				$orderDetail->order_master_id = $order->id;
				$orderDetail->sub_total = $cartItem->sub_total;
				$orderDetail->qty = $cartItem->qty;
				$orderDetail->item_id = $cartItem->item_id;
				$orderDetail->item_name = $cartItem->item_name;
				$orderDetail->main_image = $cartItem->main_image;
				$orderDetail->item_price = $cartItem->item_price;
				$orderDetail->is_deal = ($cartItem->is_deal) ? 1 : 0;

				$orderDetail->save();

				$itemsArray[] = $cartItem->item_id;

				$cartAddons = CartAddon::where('cart_master_id', $cart->id)
					->where('cart_detail_id', $cartItem->id)
					->get();
				
				if ($cartAddons->count())
				{
					foreach($cartAddons as $cartAddon)
					{
						$orderAddon = new OrderAddon;

						$orderAddon->order_master_id = $order->id;
						$orderAddon->order_detail_id = $orderDetail->id;
						$orderAddon->item_id = $cartAddon->item_id;
						$orderAddon->addon_id = $cartAddon->addon_id;
						$orderAddon->quantity = $cartAddon->quantity;
						$orderAddon->is_deal = ($cartItem->is_deal) ? 1 : 0;

						$orderAddon->save();
					}
				}

				if ($cartItem->is_deal)
				{
					$cartDealOptions = $cartItem->cartDealOptions;

					foreach ($cartDealOptions as $cartDealOption)
					{
						$orderDealOption = new OrderDealOption;

						$orderDealOption->deal_id = $cartDealOption->deal_id;
						$orderDealOption->order_master_id = $order->id;
						$orderDealOption->order_detail_id = $orderDetail->id;
						$orderDealOption->item_id = $cartDealOption->item_id;
						$orderDealOption->item_name = $cartDealOption->item_name;
						$orderDealOption->item_description = $cartDealOption->item_description;
						$orderDealOption->item_image = $cartDealOption->item_image;
						$orderDealOption->item_original_price = $cartDealOption->item_original_price;
						$orderDealOption->deal_price = $cartDealOption->deal_price;
						$orderDealOption->quantity = 0;

						$orderDealOption->save();

						$itemsArray[] = $cartDealOption->item_id;
					}
				}
			}

			$preparationTime = Items_list::whereIn('id', $itemsArray)
				->max('preparation_time');

			$cart->delete();

			CartDetail::destroy($cartDetail->pluck('id'));

			if (isset($cartDealOption) && $cartDealOption->count()) {
				CartDealOption::destroy($cartDealOption->pluck('id'));
			}
			
			if (isset($cartAddon) && $cartAddon->count()) {
				CartAddon::destroy($cartAddon->pluck('id'));
			}

			$request->session()->forget(['cart', 'vendor']);
			
			$successData = [
				'orderId' => $order->id,
				'total' => $order->grand_total,
				'deliveryTime' => $preparationTime,
				'operatorName' => $operatorRecord->company_name,
				'operatorContact' => $operatorRecord->phone,
				'operatorAddress' => $operatorRecord->details->address,
				'operatorLogo' => $operatorRecord->logo,
				'operatorBanner' => $operatorRecord->banner,
			];

			return redirect()
				->route('home')
				->with('success', 'Order placed successfully!');
		}

		return redirect()->back()->with('danger', 'Order is empty!');
	}

	public function customerOrders($customerID)
	{
		$authenticatedCustomer = Auth::guard('customer')->user();

		if ($authenticatedCustomer && $authenticatedCustomer->id == $customerID)
		{
			$orders = OrderMaster::where('customer_id', $customerID)
				->with('details', 'details.orderDealOptions', 'details.orderAddons')
				->get();

			return view('front.customer.orders', ['orders' => $orders]);
		}
		else
		{
			return abort(403);
		}
	}

	private function saveUserInfo($orderAddress, $selectedCoords)
	{
		if (auth()->check()) {
			$customer = auth()->guard('customer')->user();

			$customer->address = $orderAddress;
			$customer->geo_location = $selectedCoords;

			$customer->save();
		}
	}
}
