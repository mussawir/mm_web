<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderMaster;
use App\Models\OrderDetails;
use App\Models\Rider;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	 public $shop_logo;
	 
	/**
	* Dashboard Order Detials page 
	* @return \Controllers\Admin\AdminDashboard\index
	* Created by Musavir 20-2-2023
	* The index function will return order master 
	*/ 
	public function index()
	{
		// Get the authenticated user's email
		// $email = Auth::user()->email;

		$user = Auth::user();

		if ($user->role == 1) {
			$orders = OrderMaster::with(['customer', 'vendor'])
			->where('status', 1)
			->latest()
			->paginate(25);

			return view('admin.orders.order-master', compact('orders'));
		}
		elseif ($user->role == 2) {
			$orders = OrderMaster::with(['customer', 'branch'])
			->where('status', 1)
			->where('vendor_id', $user->vendor_id)
			->latest()
			->paginate(25);

			return view('admin.orders.vendor-orders', compact('orders'));
		}
	}
	
	/**
	* Dashboard Order Detials page 
	* @return \Controllers\Admin\AdminDashboard 
	* Created by Musavir 20-2-2023
	*/
	public function orderDetails($id)
	{
		$orderDetail = OrderDetails::where('order_master_id', $id)
			->with('orderMaster')
			->get();

		$orderMaster = $orderDetail->first()->orderMaster;

		$orderStatus = $orderMaster->status;
		$orderType = $orderMaster->order_type;

		$customerName = $orderMaster->customer->name ?? '';
		$phoneNumber = $orderMaster->customer->phone_number ?? '';
		$customerAddress = $orderMaster->customer->address ?? '';
		$vendorName = $orderMaster->vendor->company_name ?? '';
		$branchName = $orderMaster->branch->name;
		$branchId = $orderMaster->branch->id;
		$orderDate = $orderMaster->created_at->format('M d Y');
		$orderAmount = $orderMaster->order_amount;
		$deliveryCharges = $orderMaster->delivery_charges;
		$grandTotal = $orderMaster->grand_total;

		return view('admin.orders.order-details', compact('orderDetail', 'customerName', 'phoneNumber', 'customerAddress', 'branchName', 'vendorName', 'branchId', 'orderDate', 'orderAmount', 'deliveryCharges', 'grandTotal', 'id', 'orderStatus', 'orderType'));
	}
	
	public function orderHistory()
	{
		$user = Auth::user();

		if ($user->role == 1) {
			$orderHistory = OrderMaster::whereIn('status', [5, 6, 7])
			->with('customer')
			->latest()
			->paginate(25);

			return view('admin.orders.order-history', compact('orderHistory'));
		}
		elseif ($user->role == 2) {
			$orderHistory = OrderMaster::whereIn('status', [5, 6, 7])
			->where('vendor_id', $user->vendor_id)
			->with('customer')
			->latest()
			->paginate(25);
			
			return view('admin.orders.vendor-order-history', compact('orderHistory'));
		}
	}

	// $getriderorderlist = DB::table('rider_orders')
	// 	->join('shops', 'shops.id', '=', 'rider_orders.shop_id')
	// 	->join('order_master', 'order_master.id', '=', 'rider_orders.order_master_id')
	// 	->join('customers', 'customers.id', '=', 'order_master.customer_id')
	// 	->select('customers.*','order_master.*', 'shops.shop_name', 'rider_orders.*','order_master.status as order_master_status')
	// 	->where('order_master.status','<>', 3)
	// 	->orderBy('rider_orders.id', 'DESC')
	// 	->get();
	
	// public function openStore($id)
	// {
	// 	$area = Area::get();
	// 	$subarea = Subarea::get();
	// 	$shop_categories = ShopCategory::get();
	// 	$shop = DB::table('shops')
	// 		->join('area', 'area.id', '=', 'shops.area')
	// 		->join('sub_area', 'sub_area.id', '=', 'area.id')
	// 		->select('shops.*','area.label as area_label','sub_area.label as sub_area_label')
	// 		->where('shops.id', $id)
	// 		->where('shops.is_admin_approve', 0)
	// 		->get();

	// 	return view('admin.updateStore', compact('area','subarea','shop_categories','shop'));
	// }

	public function updateStore(Request $request,$id){
		
		 $this->validate($request, [
			'shop_owner' => 'required',
			'shop_name' => 'required',
			'sale_type' => 'required',
			'shop_address' => 'required',
			'whatsapp_number' => 'required|numeric',
			'email' => 'required|email',
			'area' => 'required|not_in:Select area',
			'sub_area' => 'required|not_in:Select area',
			'category' => 'required|not_in:Select Category',
			'city' => 'required',
			'payment' => 'required|numeric',
			'start_date' => 'required',
			'end_date' => 'required',
			'points_balance' => 'required|numeric',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
		]);
		
		 $origionalImage = $request->file('image');
			$thumbnailImage = Image::make($origionalImage)->widen(300);
			$imageName = $origionalImage->getClientOriginalName();
			$target_dir = "public/images/shops-logo/".$request->shop_owner. "/";
			// dd($target_dir);
			 if (!file_exists($target_dir))
			{
			  mkdir($target_dir, 0777);
			}
			$thumbnailImage->save($target_dir.$imageName);
  
		 $shop_logo_url =  'https://humawaz.org/public/images/shops-logo/'.$request->shop_owner .'/'.$imageName;
		   $digits = 4;
		$random_unique_no  =  rand(pow(10, $digits-1), pow(10, $digits)-1);
		$password = Hash::make($random_unique_no);
		// $update_shop = Shop::where('id','=',$id)->update(['password' =>$password ,'pin' =>$random_unique_no ,'banner' =>$shop_logo_url ,'shop_owner' =>$request->shop_owner , 'shop_name' => $request->shop_name,'sales_type' => $request->sale_type,'address' => $request->shop_address,'city' => $request->city,'phone_number' => $request->whatsapp_number,'email' => $request->email,'area' => $request->area,'sub_area' => $request->sub_area,'geo_location' => $request->geo_location,'points_balance' => $request->points_balance,'is_admin_approve' => 1,'payment' => $request->payment,'start_date' => $request->start_date,'end_data' => $request->end_date]);
		 
		 return redirect('/admin/new-shops-list');
		
	}

	// public function createNewShop()
	// {
	// 	$area = Area::get();
	// 	$subarea = Subarea::get();
	// 	$shop_categories = ShopCategory::get();

	// 	return view('admin.createShop', compact('area','subarea','shop_categories'));
	// }
	
	// public function createNewRider()
	// {
	// 	$Rarea = Area::get();
	// 	$Rsubarea = Subarea::get();
	// 	$Rshop_categories = ShopCategory::get();
		
	// 	return view('admin.createRider', compact('Rarea', 'Rsubarea', 'Rshop_categories'));
	// }
	
	public function newShopCreating(Request $request)
	{
		$this->validate($request, [
			'shop_owner' => 'required',
			'shop_name' => 'required',
			'sale_type' => 'required',
			'shop_address' => 'required',
			'whatsapp_number' => 'required|numeric',
			'email' => 'required|email',
			'area' => 'required|not_in:0',
			'sub_area' => 'required|not_in:0',
			'category' => 'required|not_in:0',
			'city' => 'required',
			'payment' => 'required|numeric',
			'start_date' => 'required',
			'end_date' => 'required',
			'points_balance' => 'required|numeric',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
		]);
		
		$origionalImage = $request->file('image');
		$thumbnailImage = Image::make($origionalImage)->widen(300);
		$imageName = $origionalImage->getClientOriginalName();
		$target_dir = "public/images/shops-logo/".$request->whatsapp_number. "/";
		// dd($target_dir);
		if (!file_exists($target_dir))
		{
			mkdir($target_dir, 0777);
		}
		$thumbnailImage->save($target_dir.$imageName);
		
		$shop_logo_url =  'https://humawaz.org/public/images/shops-logo/'.$request->whatsapp_number .'/'.$imageName;
		$digits = 4;
		$random_unique_no = rand(pow(10, $digits-1), pow(10, $digits)-1);
		$password = Hash::make($random_unique_no);
		// $createshop = new Shop;
		// $createshop->shop_owner = $request->shop_owner;
		// $createshop->shop_name = $request->shop_name;
		// $createshop->sales_type = $request->sale_type;
		// $createshop->address = $request->shop_address;
		// $createshop->phone_number = $request->whatsapp_number;
		// $createshop->email = $request->email;
		// $createshop->shop_category_id = $request->category;
		// $createshop->area = $request->area;
		// $createshop->sub_area = $request->sub_area;
		// $createshop->geo_location = $request->geo_location;
		// $createshop->city = $request->city;
		// $createshop->points_balance = $request->points_balance;
		// $createshop->payment = $request->payment;
		// $createshop->pin = $random_unique_no;
		// $createshop->password = $password;
		// $createshop->logo_type = $shop_logo_url;
		// $createshop->is_admin_approve = 1;
		// $createshop->start_date = $request->start_date;
		// $createshop->end_data = $request->end_date;
		// $createshop->save();
		
		return redirect('/admin/approved/shop');
	}
	
	public function approvedShopList(){
		
		// $approved_Shops = Shop::where('is_admin_approve','=',1)->orderBy('id', 'DESC')->get();
		return view('admin.approvedShopsList',compact('approved_Shops'));
	}
	
	public function approvedRiderList()
	{
		$approved_Riders = Rider::where('is_admin_approve', '=', 1)->orderBy('id', 'DESC')->get();
		return view ('admin.approvedRidersList', compact('approved_Riders'));
	}
	
	// public function editStore($id)
	// {
	// 	$area = Area::get();
	// 	$subarea = Subarea::get();
	// 	$shop_categories = ShopCategory::get();
	// 	$shop = DB::table('shops')
	// 		->join('area', 'area.id', '=', 'shops.area')
	// 		->join('sub_area', 'sub_area.id', '=', 'area.id')
	// 		->select('shops.*','area.label as area_label','sub_area.label as sub_area_label')
	// 		->where('shops.id', $id)
	// 		->where('shops.is_admin_approve', 1)
	// 		->get();

	// 	return view('admin.editshopinfo', compact('area', 'subarea', 'shop_categories', 'shop'));
	// }

	public function adminStoreUpdated(Request $request,$id){
	 
	   $this->validate($request, [
			'shop_owner' => 'required',
			'shop_name' => 'required',
			'sale_type' => 'required',
			'shop_address' => 'required',
			'whatsapp_number' => 'required|numeric',
			'email' => 'required|email',
			'area' => 'required|not_in:Select area',
			'sub_area' => 'required|not_in:Select area',
			'category' => 'required|not_in:Select Category',
			'city' => 'required',
			'payment' => 'required|numeric',
			'start_date' => 'required',
			'end_date' => 'required',
			'points_balance' => 'required|numeric',
		]);
		
		if($request->file('image') == null){
			$shop_logo = $request->shop_logo;
		}else{
		 
			$origionalImage = $request->file('image');
			$thumbnailImage = Image::make($origionalImage)->widen(300);
			$imageName = $origionalImage->getClientOriginalName();
			$target_dir = "public/images/shops-logo/".$request->shop_owner. "/";
			// dd($target_dir);
			 if (!file_exists($target_dir))
			{
			  mkdir($target_dir, 0777);
			}
			$thumbnailImage->save($target_dir.$imageName);
  
		 $shop_logo =  'https://humawaz.org/public/images/shops-logo/'.$request->shop_owner .'/'.$imageName;
			}
		
		// $update_shop = Shop::where('id','=',$id)->update([
		// 	'logo_type' =>$shop_logo ,
		// 	'shop_owner' =>$request->shop_owner ,
		// 	'shop_name' => $request->shop_name,
		// 	'sales_type' => $request->sale_type,
		// 	'shop_category_id' => $request->category,
		// 	'address' => $request->shop_address,
		// 	'city' => $request->city,
		// 	'phone_number' => $request->whatsapp_number,
		// 	'email' => $request->email,
		// 	'area' => $request->area,
		// 	'sub_area' => $request->sub_area,
		// 	'geo_location' => $request->geo_location,
		// 	'points_balance' => $request->points_balance,
		// 	'is_admin_approve' => 1,
		// 	'payment' => $request->payment,
		// 	'start_date' => $request->start_date,
		// 	'end_data' => $request->end_date
		// 	]);
		   
		   return redirect('/admin/approved/shop');
	}
	
	public function updateStoreRider(Request $request,$id)
	{
		$this->validate($request, [
		'first_name' => 'required',
		'last_name' => 'required',
		'reference_number' => 'required',
		'shop_address' => 'required',
		'whatsapp_number' => 'required',
		'email' => 'nullable',
		'area' => 'not_in:Select area',
		'sub_area' => 'not_in:Select sub_area',
		'geo_location' => 'nullable',
		'city' => 'required',
		'house_number' => 'required',
		'street' => 'required',
		'start_date' => 'required',
		'end_date' => 'nullable',
		]);
		
		$digits = 4;
		$random_unique_no  =  rand(pow(10, $digits-1), pow(10, $digits)-1);
		$password = Hash::make($random_unique_no);
		$update_rider = Rider::where('id','=',$id)->update(['password' =>$password , 'pin' =>$random_unique_no , 'first_name' =>$request->first_name , 'last_name' => $request->last_name , 'ref_phone' => $request->reference_number , 'address' => $request->shop_address , 'phone_number' => $request->whatsapp_number , 'email' => $request->email , 'area' => $request->area , 'sub_area' => $request->sub_area , 'geo_location' => $request->geo_location ,  'city' => $request->city , 'house_number' => $request->house_number, 'street' => $request->street, 'is_admin_approve' => 1 , 'start_date' => $request->start_date , 'end_date' => $request->end_date]);
		return redirect('/admin/new-rider-list');
	}
	
	public function updateRiderApproved(Request $request,$id)
	{
		$this->validate($request, [
		'first_name' => 'required',
		'last_name' => 'required',
		'reference_number' => 'required',
		'shop_address' => 'required',
		'whatsapp_number' => 'required',
		'email' => 'nullable',
		'area' => 'not_in:Select area',
		'sub_area' => 'not_in:Select sub_area',
		'geo_location' => 'nullable',
		'city' => 'required',
		'house_number' => 'required',
		'street' => 'required',
		'start_date' => 'required',
		'end_date' => 'nullable',
		]);
		
		$digits = 4;
		$random_unique_no  =  rand(pow(10, $digits-1), pow(10, $digits)-1);
		$password = Hash::make($random_unique_no);
		$update_rider1 = Rider::where('id','=',$id)->update(['password' =>$password , 'pin' =>$random_unique_no , 'first_name' =>$request->first_name , 'last_name' => $request->last_name , 'ref_phone' => $request->reference_number , 'address' => $request->shop_address , 'phone_number' => $request->whatsapp_number , 'email' => $request->email , 'area' => $request->area , 'sub_area' => $request->sub_area , 'geo_location' => $request->geo_location ,  'city' => $request->city , 'house_number' => $request->house_number, 'street' => $request->street, 'is_admin_approve' => 1 , 'start_date' => $request->start_date , 'end_date' => $request->end_date]);
		return redirect('/admin/approved/rider');
	}
	
	public function assignAreaRider(Request $request,$id)
	{
		$this->validate($request, [
		'area' => 'required|not_in:Select area',
		'sub_area' => 'required|not_in:Select sub_area',
		'city' => 'required',
		]);
		$update_rider2 = Rider::where('id','=',$id)->update(['area' => $request->area , 'sub_area' => $request->sub_area , 'city' => $request->city]);
		return redirect('/admin/approved/rider');
	}
	
	public function deliverOrder($id)
	{
		$orderMaster = OrderMaster::findOrFail($id);
		$orderMaster->status = 3;
		
		$orderMaster->save();
		
		return redirect('/admin/dashboard')
			->with('message', 'Order delivered successfully!');
	}

	public function pickOrder(Request $request, $id)
	{
		// Validate the request data
		$request->validate([
			'receivedPayment' => 'required|numeric|min:0',
		]);

		$orderMaster = OrderMaster::findOrFail($id);

		if ($orderMaster->grand_total == $request->input('receivedPayment'))
		{
			$orderMaster->status = 4;
			$orderMaster->save();

			if ($orderMaster)
			{
				// Set a flash message
				Session::flash('message', 'Order picked up successfully.');

				return response()->json([
					'status' => 1,
					'message' => 'Order picked up successfully.'
				]);
			}
		}
		else
		{
			return response()->json([
				'status' => 0,
				'message' => 'Received payment does not match.',
			]);
		}
	}

	public function approveOrder($id)
	{
		$orderMaster = OrderMaster::findOrFail($id);
		$orderMaster->status = 2;
		
		$orderMaster->save();
		
		return redirect('/admin/dashboard')->with('message', 'Order approved successfully!');
	}
	
	public function cancelOrder($id)
	{
		$orderMaster = OrderMaster::findOrFail($id);
		$orderMaster->status = 7;
		
		$orderMaster->save();
		
		return redirect('/admin/dashboard')->with('message', 'Order canceled successfully!');
	}
}
