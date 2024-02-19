<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Items_list;
use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AItemsListController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:operator');
	}

	public function getItemList()
	{
		$ItemsList = Items_list::all();
		return view('admin.ItemList', compact('ItemsList'));
	}

	public function create($vendorID)
	{
		$vendor = Vendor::findOrFail($vendorID);

		$isFoodVendor = $vendor->vendorType->is_food;

		$categories = Category::whereNotNull('parent_id')
			->where('vendor_type_id', $vendor->vendor_type_id)
			->get();

		return view('admin.items.create', compact('vendor', 'categories', 'isFoodVendor'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'category' => 'required',
			'name' => 'required|max:40',
			'discount' => 'required|numeric|between:0,99.99',
			'instock' => 'required|numeric',
			'price' => 'required|numeric|between:0.00,9999999.99',
			'description' => 'required|min:4|max:1000',
			'main_image' => 'required|image|mimes:jpeg,png,jpg|dimensions:min_width=500,min_height=500|min:100|max:4096',
			'quantity' => 'required|integer',
			'max_order_quantity' => 'required|integer',
			'preparation_time' => 'required',
		]);

		$vendorID = $request->get('vendor');

		if($request->hasfile('main_image'))
		{
			$file = $request->file('main_image');

			if ($file->isValid()) {
				$filename = time() . '.' . $file->extension();

				$sizes = [150, 250, 500];

				foreach ($sizes as $size) {
					$image = Image::make($file);
					$path = "images/vendors/{$vendorID}/items/{$size}x{$size}/";

					if (!File::isDirectory($path)) {
						File::makeDirectory($path, 0755, true, true);
					}

					$image->resize($size, null, function ($constraint) {
						$constraint->aspectRatio();
					})->save($path . $filename);
				}
			} else {
				return redirect()->back()->withErrors(['image' => 'Invalid image file.']);
			}
		}

		$item = new Items_list;

		$item->category_id = $request->input('category');
		$item->vendor_id = $vendorID;
		$item->name = $request->input('name');
		$item->discription = $request->input('description');
		$item->discount = $request->input('discount');
		$item->instock = $request->input('instock');
		$item->price = $request->input('price');
		$item->qty = $request->input('quantity');
		$item->max_order_qty = $request->input('max_order_quantity');
		$item->preparation_time = $request->input('preparation_time');
		$item->main_image = $filename;

		if ($request->input('is_addon')) {
			$item->is_addon = $request->input('is_addon');
		}

		$item ->save();

		$action = $request->input('action');

		if ($action === 'saveAndAddMore') {
			return redirect()
				->back()
				->withInput([
					'category' => $request->input('category'),
				])
				->with('message', 'Item added successfully!');
		}

		return redirect("/admin/vendors/item-list/{$item->vendor_id}")
			->with('message', 'Item added successfully!');
	}

	public function edit($id)
	{
		$item = Items_list::findOrFail($id);

		$categories = Category::whereNotNull('parent_id')
			->where('vendor_type_id', $item->vendor->vendor_type_id)
			->get();

		return view('admin.items.edit', compact('item', 'id', 'categories'));
	}

	public function update(Request $request)
	{
		$request->validate([
			'category' => 'required',
			'name' => 'required|max:40',
			'discount' => 'required|numeric|between:0,99.99',
			'instock' => 'required|numeric',
			'price' => 'required|numeric|between:0.00,9999.99',
			'description' => 'required|min:4|max:1000',
			'main_image' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=500,min_height=500|min:100|max:4096',
			'quantity' => 'required|integer',
			'max_order_quantity' => 'required|integer',
			'preparation_time' => 'required',
		]);

		$item = Items_list::findOrFail($request->id);
		$vendorID = $request->get('vendor');

		if($request->hasfile('main_image'))
		{
			$file = $request->file('main_image');

			if ($file->isValid()) {
				$filename = time() . '.' . $file->extension();

				$sizes = [500, 250, 150];

				foreach($sizes as $size)
				{
					$image = Image::make($file);
					$path = "images/vendors/{$vendorID}/items/{$size}x{$size}/";

					if (!File::isDirectory($path)) {
						File::makeDirectory($path, 0755, true, true);
					}

					if ($item->main_image)
					{
						$oldImage = public_path($path . $item->main_image);
					}

					$image->resize($size, null, function ($constraint) {
						$constraint->aspectRatio();
					})->save($path . $filename);

					if (isset($oldImage) && file_exists($oldImage))
					{
						unlink($oldImage);
					}
				}
			} else {
				return redirect()
					->back()
					->withErrors(['image' => 'Invalid image file.']);
			}
		}

		$item->name = $request->get('name');

		if (isset($filename))
		{
			$item->main_image = $filename;
		}

		$item->discount = $request->get('discount');
		$item->price = $request->get('price');
		$item->discription = $request->get('description');
		$item->qty = $request->get('quantity');
		$item->max_order_qty = $request->get('max_order_quantity');
		$item->preparation_time = $request->input('preparation_time');
		$item->category_id = $request->get('category');
		$item->vendor_id = $vendorID;
		$item->instock = $request->get('instock');

		if ($request->get('isaddon')) {
			$item->is_addon = $request->get('instock');
		}

		$item ->save();

		return redirect("/admin/vendors/item-list/{$vendorID}")
			->with('message', 'Item updated successfully!');
	}

	public function status()
	{
		$status = Items_list::all();
		return view('admin.status', compact('status'));
	}

	public function destroy($id)
	{
		$item = Items_list::findOrFail($id);

		if (!$item) {
			return redirect()->back()->with('error', 'Item not found.');
		}
	
		$item->delete();

		return redirect()->back()->with('message', 'Item deleted successfully.');
	}
}
