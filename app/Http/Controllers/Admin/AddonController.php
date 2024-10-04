<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ItemAddon;
use App\Models\Item;
use Illuminate\Http\Request;

class AddonController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:operator');
	}

	public function getAddons($category)
	{
		$addons = Item::where('is_addon', 1)
			->orderByRaw('category_id = ? desc', [$category])
			->get();

		return response()->json($addons);
	}

	public function getAddedAddons($itemId)
	{
		$item = Item::find($itemId);

		if ($item)
		{
			$addedAddons = $item->addons;

			return response()->json([
				'addedAddonsList' => view('partials.item-addons', compact('addedAddons'))->render()
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

			foreach ($selectedAddons as $addonId)
			{
				$data[] = [
					'item_id' => $item,
					'addon_id' => $addonId,
					'created_at' => now(),
					'updated_at' => now(),
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

		return response()->json([
			'status' => '200',
			'data' => 0,
			'message' => 'No addons selected'
		]);
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
		
			return response()->json(['success' => true]);
		}
		else
		{
			// Return a JSON response with an error message
			return response()->json(['error' => 'Addon not found'], 404);
		}
	}
}
