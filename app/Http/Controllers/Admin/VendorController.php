<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\DealMaster;
use App\Models\Items_list;
use App\Models\OperatorCommissionHistory;
use App\Models\OrderMaster;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:operator');
	}

	public function index()
	{
		$vendors = Vendor::latest()->get();
		return view('admin.vendors.index', compact('vendors'));
	}

	public function create()
	{
		$operatorID = Auth::user()->user_id;
		$vendorTypes = VendorType::where('status', 1)->get();
		$randomPassword = '12345678';

		return view('admin.vendors.create', compact('operatorID', 'vendorTypes', 'randomPassword'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|string|min:3',
			'company_name' => 'required|string',
			'shop_number' => 'required|numeric',
			'full_address' => 'required|string',
			'current_balance' => 'required|numeric',
			'points_in_hand' => 'required|numeric',
			'date_joining' => 'required|date',
			'primary_contact' => 'required|numeric|unique:vendors,contact_number_primary',
			'secondary_contact' => 'required|numeric|unique:vendors,contact_number_sec',
			'commission_percentage' => 'required|numeric|min:2|max:20',
			'delivery_free_after' => 'required|numeric',
			'delivery_charges' => 'required|numeric',
			'minimum_delivery_amount' => 'required|numeric',
			'email' => 'required|email|unique:vendors,email',
			'facebook' => 'nullable|string',
			'website' => 'nullable|string',
			'instagram' => 'nullable|string',
			'twitter' => 'nullable|string',
			'logo' => 'required|image|mimes:jpeg,png,jpg|min:100|max:500|dimensions:min_width=200,min_height=200',
			'banners' => 'required|array|min:3|max:3',
			'banners.*' => 'image|mimes:jpeg,png,jpg|max:500',
			'vendor_type' => 'required',
		]);

		if($request->hasfile('logo')) {
			$file = $request->file('logo');

			if ($file->isValid()) {
				$filename = time() . '.' . $file->extension();

				$file->move('images/vendors/logos/', $filename);
			} else {
				// Handle invalid file
				return redirect()->back()->withErrors(['logo' => 'Invalid image file.']);
			}
		}

		if ($request->hasFile('banners')) {
			$banners = [];
			foreach ($request->file('banners') as $key => $banner)
			{
				if ($banner->isValid()) {
					$banners[$key] = time() . $key . '.' . $banner->extension();

					$banner->move('images/vendors/banners/', $banners[$key]);
				} else {
					// Handle invalid file
					return redirect()->back()->withErrors(['banners' => 'Invalid image file.']);
				}
			}
		}

		$vendor = new Vendor;

		$vendor->name = $request->get('name');
		$vendor->vendor_type_id = $request->get('vendor_type');
		$vendor->company_name = $request->get('company_name');
		$vendor->shop_number = $request->get('shop_number');
		$vendor->full_address = $request->get('full_address');
		$vendor->current_balance = $request->get('current_balance');
		$vendor->points_in_hand = $request->get('points_in_hand');
		$vendor->date_joining = $request->get('date_joining');
		$vendor->contact_number_primary = $request->get('primary_contact');
		$vendor->contact_number_sec = $request->get('secondary_contact');
		$vendor->commission_percentage = $request->get('commission_percentage');
		$vendor->delivery_free_after = $request->get('delivery_free_after');
		$vendor->delivery_charges = $request->get('delivery_charges');
		$vendor->minimum_delivery_amount = $request->get('minimum_delivery_amount');
		$vendor->email = $request->get('email');
		$vendor->facebook = $request->get('facebook');
		$vendor->website = $request->get('website');
		$vendor->instagram = $request->get('instagram');
		$vendor->twitter_account = $request->get('twitter');

		$vendor->logo = $filename;
		$vendor->banner1 = $banners[0];
		$vendor->banner2 = $banners[1];
		$vendor->banner3 = $banners[2];

		$vendor->operator_id = $request->get('operator_id');

		$vendor->save();

		if ($vendor) {
			OperatorCommissionHistory::create([
				'vendor_id' => $vendor->id,
				'commission percentage' => $vendor->commission_percentage,
			]);

			$vendorLogin = new Admin;

			$vendorLogin->user_id = $vendor->id;
			$vendorLogin->email = $vendor->email;
			$vendorLogin->password = Hash::make($request->get('password'));
			$vendorLogin->role = 2;

			$vendorLogin->save();
		}

		return redirect()->route('vendors.index')
			->with('message', 'Vendor added successfully.');
	}

	public function show($id)
	{
		$vendor = Vendor::findOrFail($id);
		return view('admin.vendors.show', compact('vendor'));
	}

	public function edit($id)
	{
		$vendor = Vendor::where('id', $id)
			->with('operator')
			->firstOrFail();
		$operatorID = $vendor->operator->id ?? Auth::user()->user_id;
		$vendorTypes = VendorType::where('status', 1)->get();

		return view('admin.vendors.edit', compact('vendor', 'operatorID', 'vendorTypes'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required|string|min:3',
			'company_name' => 'required|string',
			'shop_number' => 'required|numeric',
			'full_address' => 'required|string',
			'current_balance' => 'required|numeric',
			'points_in_hand' => 'required|numeric',
			'date_joining' => 'required|date',
			'primary_contact' => 'required|numeric|unique:vendors,contact_number_primary',
			'secondary_contact' => 'required|numeric|unique:vendors,contact_number_sec',
			'commission_percentage' => 'required|numeric|min:2|max:20',
			'delivery_free_after' => 'required|numeric',
			'delivery_charges' => 'required|numeric',
			'minimum_delivery_amount' => 'required|numeric',
			'email' => 'required|email|unique:vendors,email',
			'facebook' => 'nullable|string',
			'website' => 'nullable|string',
			'instagram' => 'nullable|string',
			'twitter' => 'nullable|string',
			'logo' => 'image|mimes:jpeg,png,jpg|min:100|max:500|dimensions:min_width=200,min_height=200',
			'banners' => 'array|min:3|max:3',
			'banners.*' => 'image|mimes:jpeg,png,jpg|max:500',
			'vendor_type' => 'required',
		]);

		$vendor = Vendor::findOrFail($id);

		if($request->hasfile('logo'))
		{
			$file = $request->file('logo');

			if ($file->isValid()) {
				$filename = time() . '.' . $file->extension();
				
				if ($vendor->logo) {
					$oldLogo = public_path('/images/vendors/logos/' . $vendor->logo);
				}

				$file->move('images/vendors/logos/', $filename);

				if (isset($oldLogo) && file_exists($oldLogo)) {
					unlink($oldLogo);
				}
			} else {
				return redirect()->back()->withErrors(['image' => 'Invalid image file.']);
			}
		}

		if ($request->hasFile('banners')) {
			$banners = [];
			foreach ($request->file('banners') as $key => $banner)
			{
				if ($banner->isValid()) {
					$banners[$key] = time() . $key . '.' . $banner->extension();

					$bannerColumnName = 'banner' . ($key + 1);

					if ($vendor->$bannerColumnName) {
						$oldBanner = public_path('/images/vendors/banners/' . $vendor->$bannerColumnName);
					}

					$banner->move('images/vendors/banners/', $banners[$key]);

					if (isset($oldBanner) && file_exists($oldBanner)) {
						unlink($oldBanner);
					}
				} else {
					// Handle invalid file
					return redirect()->back()->withErrors(['banners' => 'Invalid image file.']);
				}
			}
		}

		$vendor->operator_id = $request->get('operator_id');
		$vendor->name = $request->get('name');
		$vendor->vendor_type_id = $request->get('vendor_type');
		$vendor->company_name = $request->get('company_name');
		$vendor->shop_number = $request->get('shop_number');
		$vendor->full_address = $request->get('full_address');
		$vendor->current_balance = $request->get('current_balance');
		$vendor->points_in_hand = $request->get('points_in_hand');
		$vendor->date_joining = $request->get('date_joining');
		$vendor->contact_number_primary = $request->get('primary_contact');
		$vendor->contact_number_sec = $request->get('secondary_contact');
		$vendor->email = $request->get('email');
		$vendor->delivery_free_after = $request->get('delivery_free_after');
		$vendor->delivery_charges = $request->get('delivery_charges');
		$vendor->minimum_delivery_amount = $request->get('minimum_delivery_amount');
		$vendor->facebook = $request->get('facebook');
		$vendor->website = $request->get('website');
		$vendor->instagram = $request->get('instagram');
		$vendor->twitter_account = $request->get('twitter');

		if (isset($filename)) {
			$vendor->logo = $filename;
		}

		if (isset($banners)) {
			$vendor->banner1 = $banners[0];
			$vendor->banner2 = $banners[1];
			$vendor->banner3 = $banners[2];
		}

		if ($vendor->commission_percentage != $request->get('commission_percentage')) {
			$vendor->commission_percentage = $request->get('commission_percentage');

			$vendor->save();

			OperatorCommissionHistory::create([
				'vendor_id' => $vendor->id,
				'commission percentage' => $vendor->commission_percentage,
			]);
		} else {
			$vendor->save();
		}

		return redirect()->route('vendors.index')
			->with('message', 'Vendor updated successfully!');
	}

	public function destroy($id)
	{
		$vendor = Vendor::findOrFail($id);
		$vendorDeals = $vendor->deals;
		$vendorItems = $vendor->items;

		if ($vendorDeals->count() || $vendorItems->count()) {
			return redirect()->route('vendors.index')
			->with('message', 'Vendor deals and items set not empty!');
		}
		
		$vendor->delete();

		return redirect()->route('vendors.index')
			->with('message', 'Vendor deleted successfully!');
	}

	public function getVendorOrders($vendorID)
	{
		$vendorOrders = OrderMaster::where('vendor_id', $vendorID)
			->with(['customer', 'vendor'])
			->latest()
			->paginate(25);

		return view('admin.vendors.vendor-orders', compact('vendorOrders'));
	}

	public function vendorItemList($vendorID)
	{
		$items = Items_list::where('vendor_id', $vendorID)
			->where('is_addon', 0)
			->with('category')
			->latest()
			->paginate(25);

		return view('admin.vendors.item-list', compact('items', 'vendorID'));
	}

	public function vendorDealList($vendorID)
	{
		$deals = DealMaster::where('vendor_id', $vendorID)
			->latest()
			->paginate(25);

		return view('admin.vendors.deal-list', compact('deals', 'vendorID'));
	}
}
