<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\DealMaster;
use App\Models\Items_list;
use App\Models\Vendor;

class FrontController extends Controller
{
	public function index()
	{
		$selectedBranch = (int) session('selectedBranch') ?? 0;

		// $vendorTypes = VendorType::where('status', 1)->get();

		$vendors = Vendor::where('branch_id', $selectedBranch)
			->with('vendorType')
			->latest()
			->get();

		return view('home', compact('vendors'));
	}

	public function vendorDetail(Request $request, $id)
	{
		$title = 'Vendor Detail - Order Delivery';

		$vendor = Vendor::findOrFail($id);

		$categories = Category::with(['items' => function ($query) use ($id) {
				$query->where('is_addon', 0)->where('vendor_id', $id);
			}])
			->orderBy('sort_by')
			->get();

		$activeCategories = $categories->filter(function ($value) {
			return $value->items->count() > 0;
		});

		$deals = DealMaster::where('status', 1)
			->where('vendor_id', $id)
			->latest()
			->take(12)
			->get();

		return view('front.vendor-detail', compact('title', 'vendor', 'deals', 'activeCategories'));
	}

	public function itemDetail($vendorId, $id)
	{
		$item = Items_list::with(['category', 'addons'])
			->findorFail($id);

		return response()->json([
			'status'=> 200,
			'vendorId' => $vendorId,
			'item' => $item,
			'message'=>'Item found!'
		]);
	}

	public function dealDetail($vendorId, $id)
	{
		$deal = DealMaster::where('status', 1)
			->with('items.item', 'items.dealOptions.item', 'addons')
			->findOrFail($id);
		
		return response()->json([
			'status' => 200,
			'vendorId' => $vendorId,
			'deal' => $deal,
			'message'=>'Deal found!'
		]);
	}

	public function loadDealsAndCategories($branch)
	{
		$categories = Category::where('branch_id' , $branch)
			->with(['items' => function ($query) {
				$query->where('is_addon', 0);
			}])
			->orderBy('sort_by')
			->get();

		$activeCategories = $categories->filter(function ($value) {
			return $value->items->count() > 0;
		})->values();

		$deals = DealMaster::where('status', 1)
			->where('branch_id', $branch)
			->latest()
			->take(12)
			->get();

		return response()->json([
			'deals' => $deals,
			'categories' => $activeCategories,
		]);
	}

	public function loadVendors($branch)
	{
		$vendors = Vendor::where('branch_id', $branch)
			->with('vendorType')
			->latest()
			->get();

		return response()->json([
			'vendors' => $vendors,
		]);
	}

	public function saveSelectedBranch(Request $request)
	{
		$selectedBranch = $request->input('selectedBranch');

		// Store the selected branch in the session
		$request->session()->put('selectedBranch', $selectedBranch);

		return response()->json([
			'status' => 200,
			'data' => true,
			'message' => 'Selected branch saved to session.'
		]);
	}
}