<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CartAddon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\OrderMaster;
use App\Models\OrderDetails;
use App\Models\CartMaster;
use App\Models\CartDetail;
use App\Models\FavouriteVendor;
use App\Models\OrderAddon;
use App\Models\Vendor;

class CheckoutController extends Controller
{
	public function index(Request $request)
	{
		// Check if the user is already logged in
		if (Auth::guard('customer')->check()) {
			$vendorID = session('vendor');
			$vendor = Vendor::findOrFail($vendorID);

			$name = Auth::guard('customer')->user()->name;
			$address = Auth::guard('customer')->user()->address;

			$ip = $request->ip();
			$cart = CartMaster::where('ip_address', $ip)
				->where('customer_id', auth()->id())
				->first();

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

			return view('front.checkout', compact('deliveryCharges', 'minimumOrderCheck', 'minimumOrderAmount', 'deliveryFreeAfer', 'name', 'address'));
		}
		else {
			return redirect()->route('customer.login');
		}
	}

	public function checkout(Request $request)
	{
		$request->validate([
			'name' => 'required|string',
		]);

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

			$cart = CartMaster::where('ip_address', $ip)->first();

			if ($cart->count())
			{
				$cartDetail = $cart->cartItems;

				$order = new OrderMaster;

				$order->operator_id = $vendor->operator_id;
				$order->vendor_id = $vendor->id;
				$order->customer_id = Auth::guard('customer')->user()->id;
				$order->order_address = $orderAddress;
				$order->further_instructions = $request->input('instructions');
				$order->item_quantity = $cart->item_quantity;
				$order->order_amount = $cart->grand_total;
				$order->delivery_charges = $deliveryCharges;
				$order->grand_total = ($cart->grand_total + $deliveryCharges);
				$order->operator_commission = $vendor->commission_percentage * ($cart->grand_total / 100);
				
				// $operatorRecord = OperatorMaster::where('id', $vendor->operator_id)->first();
				// $adminCommissionRate = $operatorRecord->details->commission_percentage;
				// $order->admin_commission = $adminCommissionRate * ($cart->grand_total / 100);

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

				// $operatorDues = new OperatorDues;

				// $operatorDues->order_id = $order->id;
				// $operatorDues->vendor_id = $vendor->id;
				// $operatorDues->operator_id = $vendor->operator_id;
				// $operatorDues->amount = $adminCommissionRate * ($cart->grand_total / 100);

				// $operatorDues->save();

				// $this->saveUserInfo($orderAddress, $selectedCoords);

				// $customerOperatorHistory = CustomerOperator::where('customer_id', $order->customer_id)
				// 	->where('operator_id', $vendor->operator_id)
				// 	->first();

				// if (! $customerOperatorHistory) {
				// 	$cusOperHist = new CustomerOperator;
				// 	$cusOperHist->customer_id = $order->customer_id;
				// 	$cusOperHist->operator_id = $vendor->operator_id;

				// 	$cusOperHist->save();
				// }
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
			}

			// $preparationTime = Item::whereIn('id', $itemsArray)
			// 	->max('preparation_time');

			$cart->delete();

			CartDetail::destroy($cartDetail->pluck('id'));

			// if (isset($cartDealOption) && $cartDealOption->count()) {
			// 	CartDealOption::destroy($cartDealOption->pluck('id'));
			// }
			
			if (isset($cartAddon) && $cartAddon->count()) {
				CartAddon::destroy($cartAddon->pluck('id'));
			}

			$request->session()->forget(['cart', 'vendor']);
			
			$successData = [
				'orderId' => $order->id,
				'total' => $order->grand_total,
			];

			return redirect()
				->route('home')
				->with('success', 'Order placed successfully!');
		}

		return redirect()->back()->with('danger', 'Order is empty!');
	}

	public function customerOrders($customerID)
	{
		$customer = Auth::guard('customer')->user();

		if ($customer && $customer->id == $customerID) {
			$orders = OrderMaster::where('customer_id', $customerID)
				->whereIn('status', [1, 2, 3, 4])
				->with('details', 'details.orderDealOptions', 'details.orderAddons')
				->latest()
				->get();

			return view('front.customer.orders', ['orders' => $orders]);
		} else {
			return abort(403);
		}
	}

	public function favouriteVendor($vendorID)
	{
		$customerID = Auth::guard('customer')->user()->id;

		$checkFavourite = FavouriteVendor::where('customer_id', $customerID)
			->where('vendor_id', $vendorID)
			->first();
		
		if ($checkFavourite) {
			$checkFavourite->delete();
			
			return redirect()
				->back()
				->with('success', 'Removed from favourites.');
		} else {
			$favouriteVendor = new FavouriteVendor;
			$favouriteVendor->customer_id = $customerID;
			$favouriteVendor->vendor_id = $vendorID;

			$favouriteVendor->save();

			return redirect()
				->back()
				->with('success', 'Added to favourites.');
		}
	}

	// private function saveUserInfo($orderAddress, $selectedCoords)
	// {
	// 	if (auth()->check()) {
	// 		$customer = auth()->guard('customer')->user();

	// 		$customer->address = $orderAddress;
	// 		$customer->geo_location = $selectedCoords;

	// 		$customer->save();
	// 	}
	// }
}
