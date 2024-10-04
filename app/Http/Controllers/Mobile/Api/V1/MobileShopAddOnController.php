<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ItemAddon;
use App\Models\Item;
use App\Models\DealMaster;
use App\Models\DealAddOn;
use Illuminate\Http\Request;

class MobileShopAddOnController extends Controller
{
	public function getAllItems($item)
	{
		$items = Item::whereNot('id', $item)
			->get();

		return response()->json([
			'status' => 200,
			'data' => $items,
			'message' => 'Items fetched successfully'
		]);
	}

	public function getCategoryAddons($category)
	{
		$addons = Item::where('is_addon', 1)
			->orderByRaw('category_id = ? desc', [$category])
			->get();

		return response()->json([
			'status' => 200,
			'data' => $addons,
			'message' => 'Category addons fetched successfully'
		]);
	}

	public function getItemAddons($item)
	{
		$item = Item::find($item);
		
		if ($item)
		{
			$addons = $item->addons;

			return response()->json([
				'status' => 200,
				'data' => $addons,
				'message' => 'Item addons fetched successfully'
			]);
		}
	}

	public function getDealAddons($deal)
	{
		$deal = DealMaster::find($deal);
		
		if ($deal)
		{
			$addons = $deal->addons;

			return response()->json([
				'status' => 200,
				'data' => $addons,
				'message' => 'Deal addons fetched successfully'
			]);
		}
	}


	public function saveAddons(Request $request, $item)
	{
		$selectedAddons = $request->input('addons');

		if ($selectedAddons)
		{
			// Delete existing addons for the item
			ItemAddon::where('item_id', $item)->delete();

			// Prepare data for bulk insert
			$data = [];

			foreach (json_decode($selectedAddons, true) as $addonId)
			{
				$data[] = [
					'item_id' => $item,
					'addon_id' => $addonId,
				];
			}
		
			// Perform bulk insert
			ItemAddon::insert($data);

			return response()->json([
				'status' => '200',
				'data' => 1,
				'message' => 'Addons saved successfully'
			]);
		}
	}
	public function saveDealAddons(Request $request, $deal)
	{
		$selectedAddons = $request->input('addons');
		if($selectedAddons)
		{
			// Delete existing addons for the item
			DealAddOn::where('deal_id', $deal)->delete();
			$data = [];
			foreach (json_decode($selectedAddons, true) as $addonId)
			{
				$data[] = [
					'deal_id' => $deal,
					'item_id' => $addonId,
					'quantity' => 1,
					'status' => 1
				];
			}
			DealAddOn::insert($data);
			return response()->json([
				'status' => '200',
				'data' => 1,
				'message' => 'Deal Addons saved successfully'
			]);
		}
	}

	public function removeAddon(Request $request, $item)
	{
		// Get the item ID from the request
		$addonId = $request->input('addon_id');

		// Find the addon by ID and item ID
		$addon = ItemAddon::where('item_id', $item)
			->where('addon_id', $addonId)
			->first();
		
		if ($addon)
		{
			$addon->delete();
		
			return response()->json([
				'status' => 200,
				'data' => 1,
				'message' => 'Addon removed successfully'
			]);
		}
		else
		{
			// Return a JSON response with an error message
			return response()->json(['error' => 'Addon not found'], 404);
		}
	}

	public function removeDealAddon(Request $request, $deal)
	{
		// Get the item ID from the request
		$addonId = $request->input('addon_id');

		// Find the addon by ID and item ID
		$addon = DealAddOn::where('deal_id', $deal)
			->where('id', $addonId)
			->first();

		if ($addon)
		{
			$addon->delete();

			return response()->json([
				'status' => 200,
				'data' => 1,
				'message' => 'Addon removed successfully'
			]);
		}
		else{
			return response()->json(['error' => 'Addon not found'], 404);
		}

	}
}
