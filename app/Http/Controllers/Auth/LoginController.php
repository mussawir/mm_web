<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustRegOtp;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
		$this->middleware('guest:admin')->except('logout');
		$this->middleware('guest:rider')->except('logout');
		$this->middleware('guest:shop')->except('logout');
		$this->middleware('guest:customer')->except('logout');
	}

	public function showAdminLoginForm()
	{
		return view('auth.login', ['url' => 'admin']);
	}

	public function adminLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:6'
		]);
		if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->get('remember'))) {
			//this is new file
			return redirect()->intended('/admin/dashboard');
		}
		$errors = new MessageBag(['password' => ['Email and/or password invalid.']]);

		return Redirect::back()->withErrors($errors)->withInput($request->only('email', 'remember'));
	}

	public function showRiderLoginForm()
	{
		return view('auth.login', ['url' => 'rider']);
	}

	public function riderLogin(Request $request)
	{
		$this->validate($request, [
			'email'   => 'required|email',
			'password' => 'required|min:6'
		]);
		if (Auth::guard('rider')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->get('remember'))) {
			return redirect()->intended('/rider/dashboard');
		}
		$errors = new MessageBag(['password' => ['Email and/or password invalid.']]);

		return Redirect::back()->withErrors($errors)->withInput($request->only('email', 'remember'));
	}

	public function showShopLoginForm()
	{
		return view('auth.login', ['url' => 'shop']);
	}

	public function shopLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:4'
		]);
		
		if (Auth::guard('shop')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->get('remember')))
		{
			return redirect()->intended('/shop/dashboard');
		}
		$errors = new MessageBag(['password' => ['Email and/or password invalid.']]);

		return Redirect::back()->withErrors($errors)->withInput($request->only('email', 'remember'));
	}

	public function showCustomerLoginForm()
	{
		return view('auth.login', ['url' => 'customer']);
	}

	public function customerLogin(Request $request)
	{
		$request->validate([
			'phone' => 'required|numeric',
		]);
		
		$phone = $request->input('phone');

		$otp = $this->generateOTP();
		$this->sendOTP($phone, $otp);
		
		Session::put('otp', $otp);
		Session::put('phone', $phone);

		return redirect()->route('customer.verify');
	}

	public function verifyForm()
	{
		return view('auth.verify');
	}

	public function verify(Request $request)
	{
		$request->validate([
			'otp' => 'required|numeric',
		]);

		$otp = $request->input('otp');
		$phone = Session::get('phone');

		$otpModel = CustRegOtp::where('otp_number', $otp)
			->where('phone_number', $phone)
			->first();

		if ($otpModel && $otp == $otpModel->otp_number) {
			$customer = Customer::where('phone_number', $phone)->first();

			if (!$customer) {
				$customer = new Customer();
				$customer->phone_number = $phone;

				$customer->save();
			}

			Auth::guard('customer')->login($customer);

			// $otpModel->delete();
			$otpModel->otp_number = null;

			$otpModel->save();

			Session::forget('phone');
			Session::forget('otp');

			return redirect()->intended('/home');
		}
	
		return redirect()->back()->withErrors(['otp' => 'Invalid OTP']);
	}

	private function generateOTP()
	{
		// Generate a 4-digit random OTP
		return mt_rand(1000, 9999);
	}

	private function sendOTP($phone, $otp)
	{
		CustRegOtp::updateOrCreate(
			['phone_number' => $phone],
			['otp_number' => $otp]
		);

		// Use the SMS package or any other SMS gateway to send the OTP to the customer's phone number
		// SMS::to($phone)->send("Your OTP is: $otp");
	}
}
