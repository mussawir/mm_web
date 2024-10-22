<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\AICameraInventory;
use App\Models\AIPhotoInventory;
use App\Models\InventoryMap;
use App\Models\Item;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MobileLocationController extends Controller
{
	public function checkLocationCapacity(Request $request)
	{
		$request->validate([
			'customer_id' => 'required|integer|exists:customers,id',
			'storeroom' => 'required|integer',
			'rack_number' => 'required|integer',
			'rack_location' => 'required|integer',
			'type' => 'required|string',
			'level' => 'required|string',
		]);

		$customerId = $request->input('customer_id');
		$storeroomNumber = $request->input('storeroom_number');
		$rackNumber = $request->input('rack_number');
		$rackLocation = $request->input('rack_location');
		$level = strtolower($request->input('level'));
		$type = $request->input('type');

		$row = (int)substr((string)$rackLocation, 0, 1);
		$column = (int)substr((string)$rackLocation, 1, 1);

		$location = Location::where('store_room', $storeroomNumber)
			->where('rack', $rackNumber)
			->where('type', $type)
			->where('rack_location', $rackLocation)
			->first();

		if (!$location) {
			return response()
				->json(['message' => 'Location not found'], 404);
		}

		$inventoryMap = InventoryMap::where('customer_id', $customerId)
			->where('location_id', $location->id)
			->first();

		if (!$inventoryMap) {
			return response()
				->json(['message' => 'No items found at this location'], 404);
		}

		$levelFraction = $this->mapLevelToFraction($level);
		$approxCurrentQuantity = $inventoryMap->capacity * (1 - $levelFraction);
		$reorderQuantity = $inventoryMap->capacity - $approxCurrentQuantity;

		return response()->json([
			'location' => [
				'row' => $row,
				'column' => $column,
				'description' => $location->description,
			],
			'item_details' => [
				'item' => $inventoryMap->item->name,
				'capacity' => $inventoryMap->capacity,
				'approx_current_quantity' => $approxCurrentQuantity,
				'reorder_quantity' => $reorderQuantity > 0 ? round($reorderQuantity) : 0,
			],
		]);
	}

	private function mapLevelToFraction($level)
	{
		switch ($level) {
			case 'full':
			case '100% full':
				return 0;
			case 'half':
			case '50% full':
			case '50% empty':
				return 0.5;
			case 'quarter':
			case '25% full':
			case '75% empty':
				return 0.75;
			case 'one third':
				return 2 / 3;
			case 'three quarters':
				return 0.25;
			case 'empty':
			case '100% empty':
				return 1;
			default:
				if (preg_match('/(\d+)% empty/', $level, $matches)) {
					return min(1, max(0, (100 - intval($matches[1])) / 100));
				}
				return 0;
		}
	}

	public function storedPhotosUpdate(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'customer_id' => 'required|integer|exists:customers,id',
			'label' => 'required|string',
			'current_stock' => 'required|string',
		]);

		if ($validator->fails()) {
			return response()
			->json(['message' => $validator->errors()->first()], 400);
		}

		$customerId = $request->input('customer_id');
		$label = $request->input('label');
		$current_stock = $request->input('current_stock');

		$item = Item::where('name', $label)->first();

		if (!$item) {
			return response()
				->json(['message' => "Item not found: $label"], 404);
		}
		$itemId = $item->id;

		DB::beginTransaction();
		try {
			AIPhotoInventory::updateOrCreate(
				[
					'customer_id' => $customerId,
					'item_id' => $itemId,
				],
				[
					'item_label' => $label,
					'current_stock' => $current_stock,
				]
			);

			DB::commit();

			return response()
				->json(['message' => "Inventory updated for customer ID: $customerId, Item: $label"], 200);
		} catch (\Exception $e) {
			DB::rollBack();
			return response()
				->json(['message' => 'Failed to update inventory.'], 500);
		}
	}

	public function update(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'customer_id' => 'required|integer|exists:customers,id',
			'label' => 'required|string',
			'current_stock' => 'required|string',
		]);

		if ($validator->fails()) {
			return response()
			->json(['message' => $validator->errors()->first()], 400);
		}

		$customerId = $request->input('customer_id');
		$label = $request->input('label');
		$current_stock = $request->input('current_stock');

		$item = Item::where('name', $label)->first();

		if (!$item) {
			return response()
				->json(['message' => "Item not found: $label"], 404);
		}
		$itemId = $item->id;

		DB::beginTransaction();
		try {
			AICameraInventory::updateOrCreate(
				[
					'customer_id' => $customerId,
					'item_id' => $itemId,
				],
				[
					'item_label' => $label,
					'current_stock' => $current_stock,
				]
			);

			DB::commit();

			return response()
				->json(['message' => "Inventory updated for customer ID: $customerId, Item: $label"], 200);
		} catch (\Exception $e) {
			DB::rollBack();
			return response()
				->json(['message' => 'Failed to update inventory.'], 500);
		}
	}
}