<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Rider;
use App\Models\City;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class AShopsListController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:operator');
	}

	public function index() {}

	public function showNewShopList() {}
	
	public function showNewRiderList()
	{
		$riders = Rider::where('is_admin_approve', 0)
			->orderBy('id', 'DESC')
			->get();

		return view('admin.newRiders',compact('riders'));
	}
	
	public function customerList()
	{
		$customers = Customer::latest()->paginate(25);

		return view('admin.customer-list', compact('customers'));
	}

	public function shopAreaDetails()
	{
		// $shop_details = Shop::where('id','=', $id)->get();
		$area = DB::table('area')->get();
		$sub_area = DB::table('sub_area')->get();
		return response()->json(['status' => 200,'data' => $area,$sub_area,'message' => 'Shops Retrieve Scuessfully']);
	}
	
	public function assignareaRider($id)
	{
		// $area = Area::get();
		// $subarea = Subarea::get();
		$city = City::get();
		$Assignarea = DB::table('riders')
			->join('area', 'area.id', '=', 'riders.id')
			->join('sub_area', 'sub_area.id', '=', 'area.id')
			->select('riders.*', 'area.label as area_label', 'sub_area.label as sub_area_label')
			->where('riders.id', $id)
			->where('riders.is_admin_approve', 1)
			->get();

		return view('admin.assignarea', compact('city', 'area', 'subarea', 'Assignarea'));
	}

	public function create() {}

	public function store(Request $request)
	{
		$ImgUrl = 'http://humawaz.org/public/images/shops/logo/300X300/';
		$digits = 8;
		$random_unique_no  =  rand(pow(10, $digits-1), pow(10, $digits)-1);
		 $password = Hash::make($random_unique_no);

		$origionalImage = $request->file('logo_type');
		$thumbnailImage = Image::make($origionalImage)->widen(300);

		$imageName = $origionalImage->getClientOriginalName();
		$thumbnailImage->save(public_path('images/shops/logo/300X300/' . $imageName));

		$thumbnailPath = public_path('images/shops/logo/origional-image/');
		$thumbnailImage->save($thumbnailPath . $origionalImage->getClientOriginalName());

		// $shops = Shop::create([
		// 	'shop_onwer' => $request->shop_onwer,
		// 	'shop_name' => $request->shop_name,
		// 	'sales_type' => $request->sales_type,
		// 	'logo_type' => $ImgUrl.$imageName,
		// 	'address' => $request->address,
		// 	'city' => $request->city,
		// 	'phone_number' => $request->phone_number,
		// 	'email' => $request->email,
		// 	'password' => $password,
		// 	'id_pas' => $random_unique_no,
		// 	'area' => $request->area,
		// 	'points_balance' => $request->points_balance,
		// ]);

		// Create directory
		// File::makeDirectory(public_path('/images/product-images/'.$shops->id, 0775, true, true));

		// return response()->json(['status' => 200,'data',$shops,'message' => 'Shops Created Scuessfully']);
	}
	
	public function openStoreRider($id)
	{
		// $area = Area::get();
		// $subarea = Subarea::get();
		$hello = DB::table('riders')
			->join('area', 'area.id', '=', 'riders.id')
			->join('sub_area', 'sub_area.id', '=', 'area.id')
			->select('riders.*', 'area.label as area_label', 'sub_area.label as sub_area_label')
			->where('riders.id', $id)
			->where('riders.is_admin_approve', 0)
			->get();
			
		return view('admin.updateStoreRider', compact('area', 'subarea', 'hello'));
	}
	
	public function openStoreRiderApproved($id)
	{
		// $area = Area::get();
		// $subarea = Subarea::get();
		$approved = DB::table('riders')
			->join('area', 'area.id', '=', 'riders.id')
			->join('sub_area', 'sub_area.id', '=', 'area.id')
			->select('riders.*', 'area.label as area_label', 'sub_area.label as sub_area_label')
			->where('riders.id', $id)
			->where('riders.is_admin_approve', 1)
			->get();

		return view('admin.updateStoreRiderApproved', compact('area', 'subarea', 'approved'));
	}
}
