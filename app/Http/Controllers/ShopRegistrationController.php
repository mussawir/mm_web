<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Customer;
use App\Models\CustRegOtp;
use App\Models\Rider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ShopRegistrationController extends Controller
{
	public function shopRegistationForm()
	{
		$area = DB::table('area')->get();
		$sub_area = DB::table('sub_area')->get();
		return view('shop_registration',compact('area','sub_area'));
	}

	public function thankYou()
	{
		return view('thank-you');
	}

	public function shopRegistration(Request $request)
	{
		$this->validate($request, [
			'owner_name' => 'required',
			'phone_number' => 'required|max:11',
			'city' => 'required',
			'area' => 'required',
			'sub_area' => 'required',
		]);

		$digits = 8;
		$random_unique_no = rand(pow(10, $digits-1), pow(10, $digits)-1);
		$password = Hash::make($random_unique_no);
		$create_shop = new Shop();
		$create_shop->shop_onwer = $request->owner_name;
		$create_shop->city = $request->city;
		$create_shop->phone_number = $request->phone_number;
		$create_shop->area = $request->area;
		$create_shop->sub_area = $request->sub_area;
		$create_shop->password = $password;
		$create_shop->id_pas = $random_unique_no;

		$create_shop->save();

		return redirect('/thankyou');
	}

	public function customerRegistationForm()
	{
		$phone = session('phone', null);

		return view('auth.customer-registration', ['phone' => $phone]);
	}

	public function customerRegistration(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255|unique:customers',
			'phone' => 'required|max:11',
			'house_number' => 'required|string|max:255',
			'street' => 'required|string|max:255',
			'address' => 'required|string|max:255',
		]);

		$customer = new Customer();

		$customer->name = $request->input('name');
		$customer->email = $request->input('email');
		$customer->phone_number = $request->input('phone');
		$customer->house_number = $request->input('house_number');
		$customer->street = $request->input('street');
		$customer->address = $request->input('address');

		$customer->save();

		if ($customer)
		{
			$otp = mt_rand(1000, 9999);

			$otpModel = CustRegOtp::updateOrCreate(
				['customer_id' => $customer->id],
				['otp_number' => $otp]
			);

			Session::put('otp', $otp);
			Session::put('phone', $request->input('phone'));
	
			return redirect()->route('customer.verify');
		}
		// return redirect('/thankyou');
	}

	public function riderRegistationForm()
	{
		return view('rider_registration');
	}

	public function riderRegistration(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			'phone_number' => 'required|max:11',
			'address' => 'required',
			'city' => 'required',
		]);

		$digits = 8;
		$random_unique_no = rand(pow(10, $digits-1), pow(10, $digits)-1);
		$password = Hash::make($random_unique_no);
		$create_customer = new Rider();
		$create_customer->name = $request->name;
		$create_customer->address = $request->address;
		$create_customer->city = $request->city;
		$create_customer->phone_no = $request->phone_number;
		$create_customer->password = $password;
		$create_customer->pas_id = $random_unique_no;

		$create_customer->save();

		return redirect('/thankyou');
	}
}