<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DealAddOn;
use App\Models\DealDetail;
use App\Models\DealMaster;
use App\Models\DealOption;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Vendor;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class DealController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:supplier');
	}

	public function index($branch)
	{
		$deals = DealMaster::where('branch_id', $branch)
			->latest()
			->paginate(10);

		return view('admin.deals.index', compact('deals', 'branch'));
	}

	public function create($vendorID)
	{
		$vendor = Vendor::findOrFail($vendorID);

		return view('admin.deals.create.create', compact('vendor'));
	}

	public function addInfo(Request $request)
	{
		$validatedData = $request->validate([
			'name' => 'required|string',
			'start_date' => 'required|date',
			'end_date' => 'required|date|after:start_date',
			'banner' => 'required|image|mimes:jpeg,png,jpg|dimensions:min_width=500,min_height=500|min:100|max:4096',
		]);

		$previousBanner = session()->get('deal.info.banner', null);
		$vendorID = $request->input('vendor');

		if($request->hasfile('banner'))
		{
			$file = $request->file('banner');

			if ($file->isValid()) {
				$banner = time() . '.' . $file->extension();

				$sizes = [150, 250, 500];

				foreach ($sizes as $size) {
					$image = Image::make($file);
					$path = "images/vendors/{$vendorID}/deals/{$size}x{$size}/";

					if (!File::isDirectory($path)) {
						File::makeDirectory($path, 0755, true, true);
					}

					if ($previousBanner) {
						$oldBanner = public_path($path . $previousBanner);
					}

					$image->resize($size, null, function ($constraint) {
						$constraint->aspectRatio();
					})->save($path . $banner);

					if (isset($oldBanner) && file_exists($oldBanner)) {
						unlink ($oldBanner);
					}
				}
			} else {
				return redirect()->back()
					->withErrors(['image' => 'Invalid image file.']);
			}
		}

		$request->session()->put('deal.info', $validatedData);
		$request->session()->put('deal.info.vendor', $vendorID);
		$request->session()->put('deal.info.description', $request->input('description'));
		$request->session()->put('deal.info.banner', $banner);

		return redirect()->route('deal.itemsForm', $vendorID);
	}

	public function showItemsForm(Request $request, $vendorID)
	{
		if ($request->session()->get('deal', [])) {
			$vendor = Vendor::findOrFail($vendorID);
			$categories = Category::whereNull('parent_id')
				->where('vendor_type_id', $vendor->vendor_type_id)
				->get();

			return view('admin.deals.create.add-items', compact('categories', 'vendor'));
		}

		return redirect()->route('deal.create', $vendorID);
	}

	public function addItems(Request $request)
	{
		$items = $request->input('selected_items', []);

		$selectedItems = [];

		if (isset($items) && count(json_decode($items, true)))
		{
			foreach (json_decode($items, true) as $key => $item)
			{
				foreach($item as $list)
				{
					$selectedItems[$key] = [
						'id' => $list['id'],
						'name' => $list['name'],
						'quantity' => $list['quantity'],
					];

					// Instead of round trips to database, we can gather all IDs
					// and run whereIn query
					if (is_array($list['items']))
					{
						foreach($list['items'] as $index => $value)
						{
							if ($value)
							{
								$selectedItems[$key]['items'][$index] = [
									'id' => $value['id'],
									'name' => $value['name'],
									'description' => $value['description'],
									'image' => $value['image'],
									'original_price' => $value['originalPrice'],
									'deal_price' => ($value['price'] > 0) ? $value['price'] : 0,
								];
							}
						}
					}
				}
			}

			$request->session()->put('deal.items.selectedItems', $selectedItems);

			return redirect()->route('deal.saveDeal', $request->input('vendor'));
		}
		else
		{
			return redirect()->back()
				->withErrors(['items' => 'No deal options added.']);
		}
	}

	public function showSaveDealForm(Request $request, $vendor)
	{
		if ($request->session()->get('deal', []))
		{
			$info = $request->session()->get('deal.info');
			$selectedItems = $request->session()->get('deal.items.selectedItems', []);

			return view('admin.deals.create.save-deal', [
				'vendor' => $vendor,
				'info' => $info,
				'selectedItems' => $selectedItems,
			]);
		}

		return redirect()->route('deal.create', $vendor);
	}

	public function store(Request $request)
	{
		$request->validate([
			'grand_total' => 'required|numeric',
		]);

		$grandTotal = $request->input('grand_total');
		$discountPrice = $request->input('discount_price') ?? 0;

		$info = $request->session()->get('deal.info');
		$items = $request->session()->get('deal.items.selectedItems');

		$deal = new DealMaster;

		$deal->name = $info['name'];
		$deal->description = $info['description'];
		$deal->banner = $info['banner'];
		$deal->start_date = $info['start_date'];
		$deal->end_date = $info['end_date'];
		$deal->vendor_id = $info['vendor'];
		$deal->grand_total = $grandTotal;
		$deal->offer = $discountPrice;
		$deal->status = 1;

		$deal->save();

		if ($deal)
		{
			// Loop through the selected menu items and their quantities
			foreach ($items as $item) {
				$quantity = $item['quantity'];

				if ($quantity)
				{
					$dealDetails = new DealDetail;

					$dealDetails->deal_id = $deal->id;
					$dealDetails->item_type_id = $item['id'];
					$dealDetails->item_type_name = $item['name'];
					$dealDetails->quantity = $quantity;
					$dealDetails->save();

					if ($dealDetails && is_array($item['items']))
					{
						foreach($item['items'] as $list)
						{
							$dealOptions = new DealOption;

							$dealOptions->deal_id = $deal->id;
							$dealOptions->deal_detail_id = $dealDetails->id;
							$dealOptions->item_id = $list['id'];
							$dealOptions->item_name = $list['name'];
							$dealOptions->item_description = $list['description'];
							$dealOptions->item_image = $list['image'];
							$dealOptions->item_original_price = $list['original_price'] ?? 0;
							$dealOptions->deal_price = $list['deal_price'] ?? 0;

							$dealOptions->save();
						}
					}
				}
			}
		}

		// Clear the session data for the deal after successful confirmation
		$request->session()->forget('deal');

		$action = $request->input('action');

		if ($action === 'saveAndAddMore') {
			return redirect()
				->route('deal.create', $request->input('vendor'))
				->with('message', 'Deal added successfully! Add another.');
		}

		return redirect()
			->route('vendors.deals', $request->input('vendor'))
			->with('message', 'Deal created successfully.');
	}

	public function show(DealMaster $deal)
	{
		// This can be shown in off canvas
		// return view('deals.show', compact('deal'));
	}

	public function edit($id, $vendorID)
	{
		$deal = DealMaster::findOrFail($id);
		return view('admin.deals.edit.edit', compact('deal', 'vendorID'));
	}

	public function editInfo(Request $request, $id)
	{
		$validatedData = $request->validate([
			'name' => 'required|string',
			'start_date' => 'required|date',
			'end_date' => 'required|date|after:start_date',
			'banner' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=500,min_height=500|min:100|max:4096',
		]);

		// Store the deal image in session
		$previousBanner = session('deal.edit.info.banner', $request->input('previous_banner'));
		$vendorID = $request->input('vendor');

		if($request->hasfile('banner'))
		{
			$file = $request->file('banner');

			if ($file->isValid()) {
				$banner = time() . '.' . $file->extension();
				$sizes = [150, 250, 500];

				foreach ($sizes as $size) {
					$image = Image::make($file);
					$path = "images/vendors/{$vendorID}/deals/{$size}x{$size}/";

					if (!File::isDirectory($path)) {
						File::makeDirectory($path, 0755, true, true);
					}

					if ($previousBanner) {
						$oldBanner = public_path($path . $previousBanner);
					}

					$image->resize($size, null, function ($constraint) {
						$constraint->aspectRatio();
					})->save($path . $banner);

					if (isset($oldBanner) && file_exists($oldBanner)) {
						unlink ($oldBanner);
					}
				}
			} else {
				return redirect()->back()
					->withErrors(['image' => 'Invalid image file.']);
			}
		}

		$request->session()->put('deal.edit.info', $validatedData);
		$request->session()->put('deal.edit.info.vendor', $vendorID);
		$request->session()->put('deal.edit.info.description', $request->input('description'));

		if (isset($banner)) {
			$request->session()->put('deal.edit.info.banner', $banner);
		} else {
			$request->session()->put('deal.edit.info.banner', $previousBanner);
		}

		return redirect()->route('deal.edit.itemsForm', [$id, $vendorID]);
	}

	public function showEditItemsForm(Request $request, $id, $vendorID)
	{
		if ($request->session()->get('deal.edit', []))
		{
			$vendor = Vendor::findOrFail($vendorID);
			$categories = Category::whereNull('parent_id')
				->where('vendor_type_id', $vendor->vendor_type_id)
				->get();

			$selectedItems = [];

			$dealDetails = DealDetail::where('deal_id', $id)->get();

			foreach($dealDetails as $dealDetail)
			{
				$selectedOptions = [];

				foreach($dealDetail->dealOptions as $dealOption)
				{
					$selectedOptions[] = [
						'id' => $dealOption['item_id'],
						'name' => $dealOption['item_name'],
						'description' => $dealOption['item_description'],
						'image' => $dealOption['item_image'],
						'originalPrice' => $dealOption['item_original_price'],
						'price' => $dealOption['deal_price'],
					];
				}

				$selectedItems[] = [
					'id' => $dealDetail->item_type_id,
					'name' => $dealDetail->item_type_name,
					'quantity' => $dealDetail->quantity,
					'items' => $selectedOptions
				];
			}

			return view('admin.deals.edit.itemsForm', compact('id', 'vendorID', 'categories', 'selectedItems'));
		}

		return redirect()->route('deal.create', $vendorID);
	}

	public function editItems(Request $request, $id)
	{
		$items = $request->input('selected_items', []);

		$selectedItems = [];

		if (count(json_decode($items, true)))
		{
			foreach (json_decode($items, true) as $item)
			{
				foreach($item as $list)
				{
					$selectedItem = [
						'id' => $list['id'],
						'name' => $list['name'],
						'quantity' => $list['quantity'],
						'items' => [],
					];

					if (is_array($list['items']))
					{
						foreach($list['items'] as $value)
						{
							if ($value)
							{
								$selectedItem['items'][] = [
									'id' => $value['id'],
									'name' => $value['name'],
									'description' => $value['description'],
									'image' => $value['image'],
									'original_price' => $value['originalPrice'],
									'deal_price' => ($value['price'] > 0) ? $value['price'] : 0,
								];
							}
						}
					}
					$selectedItems[] = $selectedItem;
				}
			}

			$request->session()->put('deal.edit.items.selectedItems', $selectedItems);

			return redirect()->route('deal.edit.editDeal', [$id, $request->input('vendor')]);
		}
		else
		{
			return redirect()->back()
				->withErrors(['items' => 'No deal options added.']);
		}
	}

	public function showEditDealForm(Request $request, $id, $vendor)
	{
		if ($request->session()->get('deal.edit', []))
		{
			$info = $request->session()->get('deal.edit.info');
			$selectedItems = $request->session()->get('deal.edit.items.selectedItems', []);

			return view('admin.deals.edit.save-deal', [
				'id' => $id,
				'vendor' => $vendor,
				'info' => $info,
				'selectedItems' => $selectedItems,
			]);
		}

		return redirect()->route('deals.vendors', $vendor);
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'grand_total' => 'required|numeric',
		]);

		$grandTotal = $request->input('grand_total');
		$discountPrice = $request->input('discount_price') ?? 0;

		$info = $request->session()->get('deal.edit.info');
		$items = $request->session()->get('deal.edit.items.selectedItems');

		$deal = DealMaster::findOrFail($id);

		$deal->name = $info['name'];
		$deal->description = $info['description'];
		$deal->banner = $info['banner'];
		$deal->start_date = $info['start_date'];
		$deal->end_date = $info['end_date'];
		$deal->vendor_id = $info['vendor'];
		$deal->grand_total = $grandTotal;
		$deal->offer = $discountPrice;
		$deal->status = 1;

		$deal->save();

		if ($deal)
		{
			DealDetail::where('deal_id', $deal->id)->delete();
			DealOption::where('deal_id', $deal->id)->delete();

			// Loop through the selected menu items and their quantities
			foreach ($items as $item) {
				$quantity = $item['quantity'];

				if ($quantity)
				{
					$dealDetails = new DealDetail;

					$dealDetails->deal_id = $deal->id;
					$dealDetails->item_type_id = $item['id'];
					$dealDetails->item_type_name = $item['name'];
					$dealDetails->quantity = $quantity;

					$dealDetails->save();

					if (is_array($item['items']) && count($item['items']))
					{
						foreach ($item['items'] as $dealOption)
						{
							$dealOptions = new DealOption;

							$dealOptions->deal_id = $deal->id;
							$dealOptions->deal_detail_id = $dealDetails->id;
							$dealOptions->item_id = $dealOption['id'];
							$dealOptions->item_name = $dealOption['name'];
							$dealOptions->item_description = $dealOption['description'];
							$dealOptions->item_image = $dealOption['image'];
							$dealOptions->item_original_price = $dealOption['original_price'];
							$dealOptions->deal_price = $dealOption['deal_price'];

							$dealOptions->save();
						}
					}
				}
			}
		}

		// Clear the session data for the deal after successful confirmation
		$request->session()->forget('deal');

		return redirect()
			->route('vendors.deals', $request->input('vendor'))
			->with('message', 'Deal updated successfully.');
	}

	public function destroy($id)
	{
		// $deal = DealMaster::findOrFail($id);
		// $deal->delete();

		// return redirect()
		// 	->route('deal.index')
		// 	->with('success', 'Deal deleted successfully.');
	}

	public function loadItems(Request $request, $deal = null)
	{
		$selectedCategories = $request->input('categories', []);

		$categoryItems = [];

		foreach ($selectedCategories as $categoryId)
		{
			if ($categoryId)
			{
				$category = Category::find($categoryId);
				$categoryItems[$categoryId] = $category->items;
			}
		}

		$selectedItems = [];

		if ($deal)
		{
			$selectedItems = DealDetail::where('deal_id', $deal)
				->select(['item_type_id', 'quantity'])
				->get()
				->groupBy('item_type_id')
				->toArray();
		}

		return view('partials.items', compact('categoryItems', 'selectedItems'))->render();
	}

	public function loadAddOns(Request $request, $deal = null)
	{
		$selectedCategories = $request->input('categories', []);

		$categoryItems = [];
		foreach ($selectedCategories as $categoryId)
		{
			if ($categoryId)
			{
				$category = Category::find($categoryId);
				$categoryItems[$categoryId] = $category->items;
			}
		}

		$selectedItems = [];
		if ($deal)
		{
			$selectedItems = DealAddOn::where('deal_id', $deal)
				->select(['item_id', 'quantity'])
				->get()
				->groupBy('item_id')
				->toArray();
		}

		return view('partials.items', compact('categoryItems', 'selectedItems'))->render();
	}

	public function updateStatus(Request $request)
	{
		$dealId = $request->input('id');
		$status = $request->input('status');

		// Find the deal by ID
		$deal = DealMaster::findOrFail($dealId);

		// Update the status column
		$deal->status = $status;
		$deal->save();

		// Return a response (optional)
		return response()->json(['status' => 'success']);
	}

	public function addDealAddOn($id)
	{
		$deal = DealMaster::findOrFail($id);

		$categories = Category::all();

		$selectedCategories = [];
		$selectedAddOns = DealAddOn::where('deal_id', $id)->get();

		foreach($selectedAddOns as $selectedAddOn)
		{
			$item = Item::find($selectedAddOn->item_id);
			$selectedCategories[] = $item->category->id;
		}
		if ($selectedCategories)
		{
			$selectedCategories = collect($selectedCategories)->unique()->values();
			$selectedCategories = $selectedCategories->toArray();
		}

		return view('admin.deals.addons.create', compact('deal', 'categories', 'selectedCategories'));
	}

	public function storeDealAddOn(Request $request)
	{
		$deal = $request->input('deal');
		$selectedAddOns = json_decode($request->input('selected_add_ons'), true);

		if ($selectedAddOns)
		{
			DealAddOn::where('deal_id', $deal)->delete();

			foreach ($selectedAddOns as $selectedAddOn)
			{
				$addon = new DealAddOn;

				$addon->deal_id = $deal;
				$addon->item_id = $selectedAddOn['id'];
				$addon->quantity = $selectedAddOn['quantity'];
				$addon->status = 1;

				$addon->save();
			}
		}
		
		return redirect()->route('deal.index', $request->input('branch'))
			->with('message', 'Deal addons added successfully.');
	}

	public function editDealAddon($id)
	{
		$deal = DealMaster::findOrFail($id);

		$categories = Category::all();

		$selectedCategories = [];
		$selectedAddOns = DealAddOn::where('deal_id', $id)->get();

		foreach($selectedAddOns as $selectedAddOn)
		{
			$item = Item::find($selectedAddOn->item_id);
			$selectedCategories[] = $item->category->id;
		}

		if ($selectedCategories)
		{
			$selectedCategories = collect($selectedCategories)->unique()->values();
			$selectedCategories = $selectedCategories->toArray();
		}

		$addons = $deal->addons;

		// Pass the deal to the view
		return view('admin.deals.addons.edit', compact('deal', 'addons', 'categories', 'selectedCategories'));
	}

	public function updateDealAddOn(Request $request)
	{
		$deal = $request->input('deal');

		$selectedAddons = json_decode($request->input('selected_add_ons'), true);

		if ($selectedAddons)
		{
			DealAddOn::where('deal_id', $deal)->delete();

			foreach ($selectedAddons as $selectedAddOn)
			{
				$addon = new DealAddOn;

				$addon->deal_id = $deal;
				$addon->item_id = $selectedAddOn['id'];
				$addon->quantity = $selectedAddOn['quantity'];
				$addon->status = 1;

				$addon->save();
			}
		}

		return redirect()->route('deal.index', $request->input('branch'))
			->with('message', 'Deal addons updated successfully.');
	}
}
