<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Branches;
use App\Models\City;
use App\Models\DealMaster;
use App\Models\Items_list;
use App\Models\OperatorCommissionHistory;
use App\Models\OrderMaster;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Http\Request;
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
		$cities = City::all();
		$vendorTypes = VendorType::where('status', 1)->get();

		return view('admin.vendors.create', compact('cities', 'vendorTypes'));
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
			'primary_contact' => 'required|numeric',
			'secondary_contact' => 'required|numeric',
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
			'city' => 'required',
			'branch' => 'required',
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

		$vendor->city_id = $request->get('city');
		$vendor->branch_id = $request->get('branch');

		$vendor->save();

		if ($vendor) {
			OperatorCommissionHistory::create([
				'vendor_id' => $vendor->id,
				'commission percentage' => $vendor->commission_percentage,
			]);
		}

		return redirect()->route('vendors.index')->with('message', 'Vendor added successfully.');
	}

	public function show($id)
	{
		$vendor = Vendor::findOrFail($id);
		return view('admin.vendors.show', compact('vendor'));
	}

	public function edit($id)
	{
		$vendor = Vendor::findOrFail($id);

		$vendorTypes = VendorType::where('status', 1)->get();
		$cities = City::all();
		$branches = Branches::where('deleted', 0)->get();

		return view('admin.vendors.edit', compact('vendor', 'vendorTypes', 'cities', 'branches'));
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
			'primary_contact' => 'required|numeric',
			'secondary_contact' => 'required|numeric',
			'commission_percentage' => 'required|numeric|min:2|max:20',
			'delivery_free_after' => 'required|numeric',
			'delivery_charges' => 'required|numeric',
			'minimum_delivery_amount' => 'required|numeric',
			'email' => 'required|email',
			'facebook' => 'nullable|string',
			'website' => 'nullable|string',
			'instagram' => 'nullable|string',
			'twitter' => 'nullable|string',
			'logo' => 'image|mimes:jpeg,png,jpg|min:100|max:500|dimensions:min_width=200,min_height=200',
			'banners' => 'array|min:3|max:3',
			'banners.*' => 'image|mimes:jpeg,png,jpg|max:500',
			'city' => 'required',
			'branch' => 'required',
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

		$vendor->city_id = $request->get('city');
		$vendor->branch_id = $request->get('branch');

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

		return redirect()->route('vendors.index')->with('message', 'Vendor updated successfully!');
	}

	public function destroy($id)
	{
		$vendor = Vendor::findOrFail($id);
		$vendor->delete();

		return redirect()->route('vendors.index')->with('message', 'Vendor deleted successfully!');
	}

	public function vendorLoginList($id)
	{
		$vendorLogins = Vendor::findOrFail($id)->logins;
		return view('admin.vendors.vendor-logins.index', compact('id', 'vendorLogins'));
	}

	public function showVendorLoginForm($id)
	{
		return view('admin.vendors.vendor-logins.create', compact('id'));
	}

	public function createVendorLogin(Request $request, $id)
	{
		$request->validate([
			'first_name' => 'required|string|min:3',
			'email' => 'required|email|unique:admins,email',
			'password' => 'required|min:6|confirmed',
		]);

		$admin = new Admin;

		$admin->first_name = $request->get('first_name');
		$admin->last_name = $request->get('last_name');
		$admin->phone_number = $request->get('phone_number');
		$admin->email = $request->get('email');
		$admin->password = Hash::make($request->get('password'));
		$admin->role = 2;
		$admin->vendor_id = $id;

		$admin->save();

		return redirect()->route('vendors.login.list', $id)
			->with('message', 'Vendor login created successfully.');
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
