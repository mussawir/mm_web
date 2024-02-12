<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Vendor;
use Illuminate\Http\Request;

class MobileShopsCategoryController extends Controller
{
	public function shopAddCategory(Request $request, $id)
	{
		$category = new Category;

		$filename = "";
		if($request->hasfile('file_attachment'))
		{
			$file = $request->file('file_attachment');
			$extention = $file->getClientOriginalExtension();
			$filename = '/images/branch-categories/'. $id . "/" . time() . '.' .$extention;
			$file->move('images/branch-categories/'. $id . "/", $filename);
		}

		$category->name = $request->input('name');
		$category->image = $filename;
		if ($request->input('parent_category'))
		{
			$category->parent_id = $request->input('parent_category');
		}
		$category->branch_id = $id;
		$category->save();

		if ($category->count())
		{
			return response()->json([
				'status' => 200,
				'data' => $category,
				'message' => 'Category added successfully!'
			]);
		}
	}

	public function getCategory($id)
	{
		$category = Category::find($id);

		return response()->json([
			'status' => 200,
			'data' => $category,
			'message' => 'Category retrieved successfully!'
		]);
	}

	public function fetchSubCategories($category, $vendorID)
	{
		$vendor = Vendor::findOrFail($vendorID);
		$subCategories = Category::where('parent_id', $category)
			->where('vendor_type_id', $vendor->vendor_type_id)
			->select('id', 'name')
			->get();

		if ($subCategories) {
			return response()->json([
				'status' => 200,
				'data' => $subCategories,
				'message' => 'Sub categories fetched successfully.'
			]);
		}
		else {
			return response()->json([]);
		}
	}

	public function fetchCities()
	{
		$cities = City::all();

		if ($cities)
		{
			return response()->json([
				'status' => 200,
				'data' => $cities,
				'message' => 'Cities list fetched successfully.'
			]);
		}
		else
		{
			return response()->json([]);
		}
	}

	public function updateCategory(Request $request, $id, $shopId)
	{
		$category = Category::find($id);

		$filename = $category->image ?? "";
		if($request->hasfile('image'))
		{
			$file = $request->file('image');
			$extention = $file->getClientOriginalExtension();
			$filename = '/images/branch-categories/'. $shopId . "/" . time() . '.' .$extention;
			$file->move('images/branch-categories/'. $shopId ."/", $filename);
		}

		$category->name = $request->input('name');
		$category->image = $filename;
		if ($request->input('parent_category'))
		{
			$category->parent_id = $request->input('parent_category');
		}
		$category->is_mu = $request->get('is_mu') ?? $category->is_mu;
		$category->branch_id = $shopId;

		$category->save();
		if ($category->count())
		{
			return response()->json([
				'status' => 200,
				'message' => 'Category updated sucessfully!'
			]);
		}
	}

	public function removeCategory($id, $shopId)
	{
		$category = Category::where('id', $id)
			->where('branch_id', $shopId)
			->with('items')
			->first();

		if ($category->items->count() > 0)
		{
			return response()->json([
				'status' => 200,
				'data' => false,
				'message' => 'Category is not empty!'
			]);
		}
		else
		{
			$category->delete();
			return response()->json([
				'status' => 200,
				'data' => true,
				'message' => 'Category removed successfully!'
			]);
		}
	}

	public function fetchChildCategoriesItems($category)
	{
		$subCategories = Category::where('parent_id', $category)
			->get();

		$items = [];

		foreach($subCategories as $subCategory)
		{
			$items = array_merge($items, $subCategory->items->map(function ($item) {
				$imagePath = "images/branch-products/{$item->branch_id}/150x150/{$item->main_image}";
				$item->main_image = $imagePath;

				return $item;
			})->filter(function ($item) {
				return $item->is_addon == 0;
			})->toArray());
		}

		if (! empty($items))
		{
			return response()->json([
				'status' => 200,
				'data' => $items,
				'message' => 'All items fetched successfully.'
			]);
		}

		return response()->json([]);
	}
}
