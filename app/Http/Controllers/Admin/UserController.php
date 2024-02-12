<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Branches;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:operator');
	}

	public function index()
	{
		$users = Admin::where('role', '!=' , null)
			->with('branch')
			->latest()
			->get();
		return view('admin.users.index', compact('users'));
	}

	// Show new user creation view
	public function create()
	{
		$branches = Branches::get();
		return view('admin.users.create', compact('branches'));
	}

	// Store new user into database
	public function store(Request $request)
	{
		$request->validate([
			'first_name' => 'required|string|min:3',
			'phone' => 'required|numeric|min:11',
			'email' => 'required|email|unique:admins,email',
			'password' => 'required|min:6|confirmed',
			'user_role' => 'required',
			'branch' => 'required',
		]);

		$admin = new Admin;
		$admin->first_name = $request->get('first_name');
		$admin->last_name = $request->get('last_name');
		$admin->phone_number = $request->get('phone');
		$admin->email = $request->get('email');
		$admin->password = Hash::make($request->get('password'));
		$admin->role = $request->get('user_role');
		$admin->branch_id = $request->get('branch');
		$status = $admin->save();
		return redirect('/admin/user/list');
	}
}
