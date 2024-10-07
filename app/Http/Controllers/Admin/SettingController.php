<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branches;
use App\Models\CartAddon;
use App\Models\CartDealOption;
use App\Models\CartDetail;
use App\Models\CartMaster;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SettingController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:supplier');
	}

	public function reorderCategories($branchId)
	{
		$categories = Category::with(['items' => function ($query) {
				$query->where('is_addon', 0);
			}])
			->orderBy('sort_by')
			->get();

		$categories = $categories->filter(function ($category) {
			return $category->items->count() > 0;
		});
		
		return view('admin.settings.reorder-categories', compact('categories'));
	}

	public function reorderItems($categoryId)
	{
		$items = Item::where('category_id', $categoryId)
			->where('is_addon', 0)
			->orderBy('sort_by')
			->get();

		return view('admin.settings.reorder-items', compact('items'));
	}

	public function updateCategoryOrder(Request $request)
	{
		$order = $request->input('order');

		foreach ($order as $value) {
			$category = Category::findOrFail($value['categoryId']);
			
			$category->sort_by = $value['sortId'];

			$category->save();
		}
	
		return response()->json(['success' => true]);
	}

	public function updateItemOrder(Request $request)
	{
		$order = $request->input('order');

		foreach ($order as $value) {
			$item = Item::findOrFail($value['itemId']);

			$item->sort_by = $value['sortId'];

			$item->save();
		}

		return response()->json(['success' => true]);
	}

	public function showOldCart()
	{
		$threeHoursAgo = Carbon::now()->subHours(3);

		$oldCarts = CartMaster::where('updated_at', '<', $threeHoursAgo)
			->get();

		return view('admin.settings.show-old-cart', compact('oldCarts'));
	}

	public function cleanOldCart()
	{
		$threeHoursAgo = Carbon::now()->subHours(3);

		$oldCarts = CartMaster::where('updated_at', '<', $threeHoursAgo)
			->get();

		if ($oldCarts->isNotEmpty()) {
			$oldCarts->each(function ($cart) {
				if (isset($cart->id)) {
					CartDetail::where('cart_master_id', $cart->id)->delete();
					CartDealOption::where('cart_master_id', $cart->id)->delete();
					CartAddon::where('cart_master_id', $cart->id)->delete();

					$cart->delete();
				}
			});
		
			return redirect()->back()
				->with('message', 'Old cart data removed successfully.');
		}
		else {
			return redirect()->back()
				->with('message', 'Nothing to clean.');
		}
	}
}
