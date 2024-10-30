<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CartAddon;
use App\Models\CartDealOption;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\CartMaster;
use App\Models\CartDetail;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
	public function cart()
	{
		return view('front.cart');
	}
	
	public function addToCart(Request $request)
	{
		// if ($request->input('vendor') !== session('vendor')) {
		// 	session::forget('cart');
		// }

		$ip = $request->ip();
		// $vendor = $request->input('vendor');
		$customer = auth()->id();
		// This should be removed later
		$type = $request->input('type');
		// $id = $request->input('id');
		// $quantity = $request->input('quantity');
		
		// $selectedAddons = $request->input('addons', []);
		// $addonQuantities = $request->input('addon_quantities', []);

		$item = null;
		// $itemImageColumn = '';
		// $itemPriceColumn = '';

		$cart = session()->get('cart', []);

		$items = $request->input('items');

		$ids = array_column($items, 'id');
		$itemsData = Item::select(['id', 'name', 'price', 'image'])
			->whereIn('id', $ids)
			->get()
			->keyBy('id');

		$uniqueKeys = [];
		foreach ($items as $item) {
			$itemData = $itemsData[$item['id']];
			$uniqueKey = $itemData->id;

			$uniqueKeys[] = $itemData->id;

			// If item does not exist in cart, add it with all details
			if (!isset($cart[$type][$uniqueKey])) {
				$cart[$type][$uniqueKey] = [
					'name' => $itemData->name,
					'quantity' => $item['quantity'],
					'price' => $itemData->price,
					'image' => $itemData->image,
				];
			}

			// Update quantity if item already in cart
			$cart[$type][$uniqueKey]['quantity'] = $item['quantity'];
		}


		session()->put('cart', $cart);
		session()->put('cartTotal', $this->getGrandTotal($cart, $uniqueKey));

		$this->saveCarttoDB($ip, $customer, $uniqueKeys, $type);

		return redirect()->back()->with('success', 'Added to cart successfully!');
	}
	
	public function update(Request $request)
	{
		// $validator = Validator::make($request->all(), [
		// 	'type' => 'required|string',
		// 	'id' => 'required|numeric',
		// 	'quantity' => 'required|numeric|min:1',
		// ]);

		// if ($validator->fails()) {
		// 	return response()->json(['errors' => $validator->errors()], 400);
		// }

		$type = $request->input('type');
		$id = $request->input('id');
		$quantity = $request->input('quantity');

		if($id && $quantity)
		{
			$cart = session()->get('cart');
			$cart[$type][$id]['quantity'] = $quantity;

			session()->put('cartTotal', $this->getGrandTotal($cart, $id));

			if ($type === 'deal') {
				$cartDetail = CartDetail::where('unique_key', $id)
				->first();
			} else {
				$cartDetail = CartDetail::where('item_id', $id)
				->first();
			}

			$cartDetail->qty = $quantity;
			$cartDetail->sub_total = (int) $quantity * $cartDetail->item_price;
			
			$cartDetail->save();

			session()->put('cart', $cart);

			$cartMaster = CartMaster::find($cartDetail->cart_master_id);

			$deals = count(session()->get('cart.deal', []));
			$items = count(session()->get('cart.item', []));

			$cartMaster->item_quantity = ($deals + $items);
			$cartMaster->grand_total = $this->getGrandTotal(session('cart'), $id);

			$cartMaster->save();

			session()->flash('success', 'Cart updated successfully.');
		}

		if ($request->quantity <= 0)
		{
			$this->remove($request);
		}
	}
	
	public function remove(Request $request)
	{
		$type = $request->input('type');
		$id = $request->input('id');

		if($id) {
			$cart = session()->get('cart');
			
			if(isset($cart[$type][$id]))
			{
				$itemID = explode('-', $id)[0];

				$cartDetail = CartDetail::where('item_id', $itemID)
					->first();

				if ($cartDetail)
				{
					if (isset($cart[$type][$id]['addons']) && count($cart[$type][$id]['addons']))
					{
						CartAddon::where('cart_detail_id', $cartDetail->id)
							->where('item_id', $itemID)
							->delete();
					}

					$cartDetail->delete();

					unset($cart[$type][$id]);
				}

				session()->put('cart', $cart);
				session()->put('cartTotal', $this->getGrandTotal($cart, $id));

				$cartMaster = CartMaster::firstOrNew([
					'ip_address' => $request->ip(),
				]);

				$cartMaster->item_quantity = count(session()->get('cart.item', []));
				if (count(session()->get('cart.item', [])) == 0) {
					session()->forget('vendor');
				}

				$cartMaster->grand_total = $this->getGrandTotal(session('cart'), $id);

				$cartMaster->save();
			}
			session()->flash('success', 'Item removed successfully');
		}
	}

	// private function saveCarttoDB($ip, $vendor, $id, $type, $options = [])
	private function saveCarttoDB($ip, $customer, $ids, $type)
	{
		// This needs to be fetched from session cart
		// Performance issue if DB is called too many times
		foreach($ids as $id) {
			$item = Item::with('vendor')->findOrFail($id);
			session()->put('vendor', $item->vendor->id);
			$cartMaster = CartMaster::firstOrNew([
				'ip_address' => $ip,
				'customer_id' => $customer,
			]);
	
			$cartMaster->ip_address = $ip;
			$cartMaster->operator_id = $item->vendor->operator_id;

			$cartMaster->item_quantity = count(session()->get('cart.item', []));

			$cartMaster->grand_total = $this->getGrandTotal(session('cart'), $id);
			$cartMaster->vendor_id = $item->vendor->id;
			$cartMaster->status = 1;

			$cartMaster->save();
			
			foreach(session('cart') as $key => $cartItem)
			{
				if ($key == $type)
				{
					$itemTotal = $cartItem[$id]['quantity'] * $cartItem[$id]['price'];
					$itemID = explode('-', $id)[0];

					$cartDetail = CartDetail::updateOrCreate(
						['unique_key' => $id, 'cart_master_id' => $cartMaster->id],
						[
							'item_id' => $itemID,
							'sub_total' => $itemTotal,
							// 'sub_total' => ($itemTotal + $addonTotal),
							'qty' => $cartItem[$id]['quantity'],
							'item_name' => $cartItem[$id]['name'],
							'main_image' => $cartItem[$id]['image'],
							'item_price' => $cartItem[$id]['price'],
							'is_deal' => ($type === 'deal') ? '1' : '0',
						]
					);

					if ($cartItem[$id]['addons'] ?? null)
					{
						CartAddon::where('cart_master_id', $cartMaster->id)
							->where('cart_detail_id', $cartDetail->id)
							->where('item_id', $itemID)
							->delete();

						foreach($cartItem[$id]['addons'] as $addon)
						{
							$addons[] = [
								'cart_master_id' => $cartMaster->id,
								'cart_detail_id' => $cartDetail->id,
								'item_id' => $itemID,
								'addon_id' => $addon['id'],
								'quantity' => $addon['quantity'],
								'is_deal' => ($type === 'deal') ? 1 : 0,
							];
						}
						if (!empty($addons))
						{
							CartAddon::insert($addons);
						}
					}
				}
			}
		}
	}

	public function clearCart(Request $request)
	{
		$ip = $request->ip();

		$cart = CartMaster::where('ip_address', $ip)->first();

		CartDetail::where('cart_master_id', $cart->id)->delete();
		CartDealOption::where('cart_master_id', $cart->id)->delete();
		CartAddon::where('cart_master_id', $cart->id)->delete();

		$cart->delete();

		Session::forget('cart');
	}

	private function getGrandTotal($cart = [], $id)
	{
		$total = 0;

		if (is_array($cart) && count($cart))
		{
			foreach($cart as $key => $items)
			{
				if (is_array($items) && count($items))
				{
					foreach($items as $item)
					{
						$itemTotal = $item['quantity'] * $item['price'];
						$addonTotal = 0;
						// $dealOptionsTotal = 0;

						// if ($key === 'deal')
						// {
						// 	if (is_array($item['options']) && count($item['options']))
						// 	{
						// 		foreach($item['options'] as $option)
						// 		{
						// 			foreach($option as $dealOption)
						// 			{
						// 				if (is_array($dealOption) && count($dealOption))
						// 				{
						// 					if (intval($dealOption['deal_price']) !== 0) {
						// 						$dealOptionsTotal += intval($dealOption['deal_price'] * intval($item['quantity']));
						// 					}
						// 				}
						// 			}
						// 		}
						// 	}
						// }

						// foreach ($item['addons'] as $addon)
						// {
						// 	$addonTotal += $addon['price'] * $addon['quantity'];
						// }

						// $total += ($itemTotal + $addonTotal + $dealOptionsTotal);
						$total += ($itemTotal + $addonTotal);
					}
				}
				elseif (count($items))
				{
					$total += $items[$id]['price'] * $items[$id]['quantity'];
				}
			}
		}

		return $total;
	}
}
