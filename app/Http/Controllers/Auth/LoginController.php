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
			return redirect()->intended('/admin/dashboard');
		}

		$errors = new MessageBag(['password' => ['Email and/or password invalid.']]);

		return Redirect::back()->withErrors($errors)
			->withInput($request->only('email', 'remember'));
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

		$customer = Customer::where('phone_number', $request->phone)->first();

		if ($customer) {
			return redirect()
				->route('customer.verify.pin')
				->withInput(['phone' => $request->phone]);
		} else {
			return redirect()
				->route('customer.register')
				->withInput(['phone' => $request->phone]);
		}
	}

	public function showCustomerRegistrationForm()
	{
		return view('auth.register');
	}

	public function customerRegister(Request $request)
	{
		$request->validate([
			'name' => 'required|string',
			'phone' => 'required|numeric|unique:customers,phone_number',
			'pin' => 'required|digits:4|confirmed',
		]);

		$customer = new Customer;

		$customer->phone_number = $request->phone;
		$customer->name = $request->name;
		$customer->pin = $request->pin;
		$customer->verified_customer = 0;

		$customer->save();

		$otp = $this->generateOTP();
		$this->sendOTP($customer->id, $customer->phone_number, $otp);

		Session::put('otp', $otp);
		Session::put('phone', $request->phone);

		return redirect()->route('customer.verify');
	}

	public function showPinVerificationForm()
	{
		return view('auth.verify-pin');
	}

	public function verifyPin(Request $request)
	{
		$request->validate([
			'phone' => 'required|numeric',
			'pin' => 'required|digits:4|numeric',
		]);

		$customer = Customer::where("phone_number", $request->phone)->first();

		if (! $customer) {
			return redirect()
				->back()
				->with('message', 'Customer not found.')
				->withInput(['phone' => $request->phone]);
		}

		if ($customer->pin != $request->pin) {
			return redirect()
				->back()
				->with('message', 'Wrong PIN.')
				->withInput(['phone' => $customer->phone_number]);
		}

		Auth::guard('customer')->login($customer);

		return redirect()->intended();
	}

	public function verifyForm()
	{
		return view('auth.verify');
	}

	public function verify(Request $request)
	{
		$request->validate([
			'otp' => 'required|digits:4|numeric',
		]);

		$otp = $request->input('otp');
		$phone = Session::get('phone');

		$otpModel = CustRegOtp::where('otp_number', $otp)
			->where('phone_number', $phone)
			->first();

		if ($otpModel && $otp == $otpModel->otp_number) {
			$customer = Customer::where('phone_number', $phone)->first();

			if ($customer) {
				$otpModel->delete();
				$customer->verified_customer = 1;

				$customer->save();

				Session::forget(['phone', 'otp']);

				return redirect()
					->route('customer.login')
					->with('message', 'Successfully verified OTP.');
			} else {
				return redirect()
					->back()
					->with('message', 'Customer not found.');
			}
		}
	
		return redirect()->back()->withErrors(['otp' => 'Invalid OTP']);
	}

	private function generateOTP()
	{
		// Generate a 4-digit random OTP
		return mt_rand(1000, 9999);
	}

	private function sendOTP($customerID, $phone, $otp)
	{
		CustRegOtp::updateOrCreate(
			['customer_id' => $customerID, 'phone_number' => $phone],
			['otp_number' => $otp]
		);

		// Use the SMS package or any other SMS gateway to send the OTP to the customer's phone number
		// SMS::to($phone)->send("Your OTP is: $otp");
	}
}
