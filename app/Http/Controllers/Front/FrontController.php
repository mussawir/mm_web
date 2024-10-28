<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AICameraInventory;
use App\Models\AIPhotoInventory;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\DealMaster;
use App\Models\InventoryMap;
use App\Models\Item;
use App\Models\OperatorMaster;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
	public function index()
	{
		$customer = Auth::guard('customer')->user();
		$userCity = $customer->city_id;

		// $sessionCity = session('selectedCity') ?? null;

		$operators = OperatorMaster::with('details')->get();
		$operatorIDs = [];

		foreach($operators as $operator) {
			if($operator->details->city_id == $userCity) {
				$operatorIDs[] = $operator->id;
			}
		}

		$vendors = Vendor::whereIn('operator_id', $operatorIDs)->get();

		$items = Item::whereIn('vendor_id', $vendors->pluck('id'))->get();

		$categories = Category::whereNotNull('parent_id')->get();

		return view('home', compact('items', 'categories'));
	}

	public function vendorDetail(Request $request, $id)
	{
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

		return view('front.vendor-detail', compact('vendor', 'deals', 'activeCategories'));
	}

	public function categoryDetail(Request $request, $id)
	{
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

		return view('front.vendor-detail', compact('vendor', 'deals', 'activeCategories'));
	}

	public function itemDetail($vendorId, $id)
	{
		$item = Item::with(['category', 'addons'])
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

	public function loadSuppliers(Request $request)
	{
		$selectedCity = json_decode($request->input('selectedCity'));

		$operators = OperatorMaster::with('details')->get();

		// Filtering operators based on city
		$filteredOperators = [];

		foreach($operators as $operator) {
			if($operator->details->city_id == $selectedCity) {
				$filteredOperators[] = $operator;
			}
		}

		$operatorIds = array_column($filteredOperators, 'id');

		$vendors = Vendor::whereIn('operator_id', $operatorIds)
			->with(['categories', 'vendorType'])
			->get();

		return response()->json([
			'status' => 200,
			'message' => 'Suppliers retrieved successfully.',
			'vendors' => $vendors,
		]);
	}

	public function saveSelectedCity(Request $request)
	{
		$selectedCity = json_decode($request->input('selectedCity'));

		// Store the selected city in the session
		$request->session()->put('selectedCity', $selectedCity);

		return response()->json([
			'status' => 200,
			'data' => true,
			'message' => 'Selected city saved to session.'
		]);
	}
	
	public function getCategories() {
		$categories = Category::whereNotNull('parent_id')->get();

		return view('front.categories', compact('categories'));
	}

	public function inventoryStatus()
	{
		$customerId = auth()->id();

		$inventoryData = InventoryMap::where('customer_id', $customerId)
			->with(['item', 'location'])
			->get();
	
		return view('front.inventory-status', compact('inventoryData'));
	}

	public function aiInventory()
	{
		$customerId = auth()->id();

		$inventoryData = AICameraInventory::where('customer_id', $customerId)
			->get();
		
		$storedPhotos = AIPhotoInventory::where('customer_id', $customerId)
			->with('item')
			->get();

		return view('front.ai-inventory', compact('inventoryData', 'storedPhotos'));
	}

	public function inventoryAIGenerator()
	{
		return view('front.inventory-ai-generator');
	}
}