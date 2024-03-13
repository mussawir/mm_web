<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CartAddon;
use App\Models\CartDealOption;
use Illuminate\Http\Request;
use App\Models\Items_list;
use App\Models\CartMaster;
use App\Models\CartDetail;
use App\Models\DealDetail;
use App\Models\DealMaster;
use App\Models\DealOption;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
	public function cart()
	{
		return view('front.cart');
	}
	
	public function addToCart(Request $request)
	{
		if ($request->input('vendor') !== session('vendor')) {
			session::forget('cart');
		}

		$ip = $request->ip();
		$type = $request->input('type');
		$vendor = $request->input('vendor');
		$id = $request->input('id');
		$quantity = $request->input('quantity');
		$selectedAddons = $request->input('addons', []);
		$addonQuantities = $request->input('addon_quantities', []);

		$cart = session()->get('cart', []);

		$item = null;
		$itemImageColumn = '';
		$itemPriceColumn = '';

		if ($type === 'deal') {
			$item = DealMaster::findOrFail($id);
			$itemImageColumn = 'banner';
			$itemPriceColumn = 'grand_total';
		} elseif ($type === 'item') {
			$item = Items_list::findOrFail($id);
			$itemImageColumn = 'main_image';
			$itemPriceColumn = 'price';
		}

		// Check if item quantity exceeds max order quantity set by admin
		if (isset($item->max_order_qty) && $quantity > $item->max_order_qty) {
			return redirect()
				->back()
				->withErrors(['quantity' => "Maximum order quantity for this {$type} is: {$item->max_order_qty}"]);
		}

		if (!isset($cart[$type][$id])) {
			$cart[$type][$id] = [
				"name" => $item->name,
				"quantity" => $quantity,
				"price" => $item->$itemPriceColumn,
				"image" => $item->$itemImageColumn,
			];
		}

		// Update item or deal quantity
		$cart[$type][$id]['quantity'] = $quantity;

		if ($request->input('options') && count($request->input('options'))) {
			foreach($request->input('options') as $key => $item)
			{
				$dealDetail = DealDetail::findorFail($key);

				$cart[$type][$id]['options'][$key] = [
					'name' => $dealDetail->item_type_name,
					'quantity' => $dealDetail->quantity,
				];

				$optionIds = is_array($item) ? $item : [$item];

				$dealOptions = [];

				foreach($optionIds as $optionId)
				{
					$dealOption = DealOption::find($optionId);

					if ($dealOption)
					{
						$dealOptions[] = $dealOption;
					}
				}

				foreach ($dealOptions as $dealOption)
				{
					$cart[$type][$id]['options'][$key][] = [
						'id' => $dealOption->item_id,
						'name' => $dealOption->item_name,
						'description' => $dealOption->item_description,
						'image' => $dealOption->item_image,
						'original_price' => $dealOption->item_original_price,
						'deal_price' => $dealOption->deal_price,
					];
				}
			}
		}

		if (!isset($cart[$type][$id]['addons']))
		{
			$cart[$type][$id]['addons'] = [];
		}

		// Reference to the addons in the cart
		$cartAddons = &$cart[$type][$id]['addons'];

		foreach ($cartAddons as $index => $cartAddon)
		{
			$addonId = $cartAddon['id'];
			if (isset($selectedAddons[$addonId]) && $selectedAddons[$addonId]) {
				$cartAddons[$index]['quantity'] = $addonQuantities[$addonId] ?? 0;
			} else {
				// If the addon doesn't exist in selectedAddons, remove it
				unset($cartAddons[$index]);
			}
		}

		// Loop through selectedAddons to add new addons to the cart
		foreach ($selectedAddons as $addonId => $selected) {
			if ($selected) {
				$addon = Items_list::findOrFail($addonId);
				$addonQuantity = $addonQuantities[$addonId] ?? 0;
	
				$existingAddon = null;
				foreach ($cartAddons as $index => $cartAddon) {
					if ($cartAddon['id'] === $addonId) {
						$existingAddon = $index;
						break;
					}
				}
	
				if ($existingAddon !== null) {
					// If the addon already exists in the cart, update its quantity
					$cartAddons[$existingAddon]['quantity'] = $addonQuantity;
				} else {
					// If the addon doesn't exist in the cart, add it directly to the addons array
					$cartAddons[] = [
						'id' => $addon->id,
						'name' => $addon->name,
						'quantity' => $addonQuantity,
						'price' => $addon->price,
					];
				}
			}
		}

		session()->put('vendor', $vendor);
		session()->put('cart', $cart);
		session()->put('cartTotal', $this->getGrandTotal($cart, $id));

		$this->saveCarttoDB($ip, $vendor, $id, $type, $request->get('options', []));

		return redirect()->back()->with('success', 'Item added to cart successfully!');
	}
	
	public function update(Request $request)
	{
		// Validate and sanitize your request here

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

			$cartDetail = CartDetail::where('item_id', $id)
				->first();

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

		if($id)
		{
			$cart = session()->get('cart');
			
			if(isset($cart[$type][$id]))
			{
				$cartDetail = CartDetail::where('item_id', $id)
					->first();
				
				if ($cartDetail)
				{
					if ($type === 'deal')
					{
						CartDealOption::where('cart_detail_id', $cartDetail->id)
							->where('deal_id', $id)
							->delete();
					}

					if (count($cart[$type][$id]['addons']))
					{
						CartAddon::where('cart_detail_id', $cartDetail->id)
							->where('item_id', $id)
							->delete();
					}

					$cartDetail->delete();

					unset($cart[$type][$id]);
				}

				session()->put('cart', $cart);

				$cartMaster = CartMaster::firstOrNew([
					'ip_address' => $request->ip(),
				]);

				$deals = count(session()->get('cart.deal', []));
				$items = count(session()->get('cart.item', []));

				$cartMaster->item_quantity = ($deals + $items);
				$cartMaster->grand_total = $this->getGrandTotal(session('cart'), $id);

				$cartMaster->save();
			}
			session()->flash('success', 'Item removed successfully');
		}
	}

	private function saveCarttoDB($ip, $vendor, $id, $type, $options = [])
	{
		if ($type === 'deal') {
			$deal = DealMaster::with('vendor')->findOrFail($id);
		} elseif ($type === 'item') {
			$item = Items_list::with('vendor')->findOrFail($id);
		}

		$cartMaster = CartMaster::firstOrNew([
			'ip_address' => $ip
		]);

		$cartMaster->ip_address = $ip;

		if ($type === 'deal') {
			$cartMaster->operator_id = $deal->vendor->operator_id;
		} elseif ($type === 'item') {
			$cartMaster->operator_id = $item->vendor->operator_id;
		}

		$deals = count(session()->get('cart.deal', []));
		$items = count(session()->get('cart.item', []));
		$cartMaster->item_quantity = ($deals + $items);

		$cartMaster->grand_total = $this->getGrandTotal(session('cart'), $id);
		$cartMaster->vendor_id = $vendor;
		$cartMaster->status = 1;

		$cartMaster->save();
		
		foreach(session('cart') as $key => $cartItem)
		{
			if ($key == $type)
			{
				$itemTotal = $cartItem[$id]['quantity'] * $cartItem[$id]['price'];
				$addonTotal = 0;
				
				foreach ($cartItem[$id]['addons'] as $addon)
				{
					$addonTotal += $addon['price'] * $addon['quantity'];
				}

				$cartDetail = CartDetail::updateOrCreate(
					['item_id' => $id, 'cart_master_id' => $cartMaster->id],
					[
						'sub_total' => ($itemTotal + $addonTotal),
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
						->where('item_id', $id)
						->delete();

					foreach($cartItem[$id]['addons'] as $addon)
					{
						$addons[] = [
							'cart_master_id' => $cartMaster->id,
							'cart_detail_id' => $cartDetail->id,
							'item_id' => $id,
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

				$newOptions = array_keys($options);

				if ($newOptions)
				{
					CartDealOption::where('deal_id', $deal->id)
						->where('cart_master_id', $cartMaster->id)
						->where('cart_detail_id', $cartDetail->id)
						->delete();

					foreach($newOptions as $newOption)
					{
						if (array_key_exists($newOption, session("cart.{$key}.{$id}.options")))
						{
							$thisOption = session("cart.{$key}.{$id}.options.{$newOption}");

							$thisOption = array_filter($thisOption, function ($item) {
								return is_array($item);
							});

							$newDealOptions = [];

							foreach ($thisOption as $onlyOption)
							{
								$newDealOptions[] = [
									'deal_id' => $deal->id,
									'cart_master_id' => $cartMaster->id,
									'cart_detail_id' => $cartDetail->id,
									'item_id' => $onlyOption['id'],
									'item_name' => $onlyOption['name'],
									'item_description' => $onlyOption['description'] ?? null,
									'item_image' => $onlyOption['image'] ?? null,
									'item_original_price' => $onlyOption['original_price'] ?? 0,
									'deal_price' => $onlyOption['deal_price'] ?? 0,
									'quantity' => 0,
								];
							}

							if (!empty($newDealOptions))
							{
								CartDealOption::insert($newDealOptions);
							}
						}
					}
				}
			}
		}
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
						$dealOptionsTotal = 0;

						if ($key === 'deal')
						{
							if (is_array($item['options']) && count($item['options']))
							{
								foreach($item['options'] as $option)
								{
									foreach($option as $dealOption)
									{
										if (is_array($dealOption) && count($dealOption))
										{
											if (intval($dealOption['deal_price']) !== 0) {
												$dealOptionsTotal += intval($dealOption['deal_price']);
											}
										}
									}
								}
							}
						}

						foreach ($item['addons'] as $addon)
						{
							$addonTotal += $addon['price'] * $addon['quantity'];
						}

						$total += ($itemTotal + $addonTotal + $dealOptionsTotal);
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
}
