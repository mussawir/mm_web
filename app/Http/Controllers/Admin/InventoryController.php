<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InventoryMap;
use App\Models\Item;
use App\Models\Location;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
	public function index()
	{
		$items = Item::all();
		return view('admin.inventory.index', compact('items'));
	}

	public function create()
	{
		return view('admin.inventory.create');
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'sku' => 'required|unique:items,sku',
			'category_id' => 'required',
		]);

		Item::create($request->all());

		return redirect()->route('inventory.index')->with('success', 'Item created successfully.');
	}

	public function show($id)
	{
		$item = Item::findOrFail($id);
		return view('admin.inventory.show', compact('item'));
	}

	public function edit($id)
	{
		$item = Item::findOrFail($id);
		return view('admin.inventory.edit', compact('item'));
	}

	public function update(Request $request, $id)
	{
		$item = Item::findOrFail($id);
		$request->validate([
			'name' => 'required',
			'sku' => 'required|unique:items,sku,' . $id,
			'category_id' => 'required',
		]);

		$item->update($request->all());

		return redirect()->route('inventory.index')->with('success', 'Item updated successfully.');
	}

	public function destroy($id)
	{
		// Delete specific inventory item
		$item = Item::findOrFail($id);
		$item->delete();

		return redirect()->route('inventory.index')->with('success', 'Item deleted successfully.');
	}

	public function mapping()
	{
		$inventoryMaps = InventoryMap::with('item', 'location')->get();
		return view('admin.inventory-mapping.index', compact('inventoryMaps'));
	}

	public function mappingCreate()
	{
		$items = Item::all();
		$locations = Location::all();
		return view('admin.inventory-mapping.create', compact('items', 'locations'));
	}

	public function mappingStore(Request $request)
	{
		$validatedData = $request->validate([
			'item_id' => 'required',
			'location_id' => 'required',
			'quantity' => 'required',
		]);

		$inventoryMap = InventoryMap::updateOrCreate(
			['item_id' => $validatedData['item_id'], 'location_id' => $validatedData['location_id']]
		);

		$inventoryMap->quantity = $validatedData['quantity'];
		$inventoryMap->save();

		return redirect()->route('inventory.mapping.index');
	}
}
