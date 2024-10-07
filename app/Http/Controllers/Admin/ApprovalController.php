<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
	public function index()
	{
		$customers = Customer::where('is_approved', 0)->get();

		return view('admin.approval.approve-customers', compact('customers'));
	}

	public function approve($id)
	{
		$customer = Customer::findOrFail($id);
		$customer->is_approved = 1;

		$customer->save();

		return back()->with('message', 'Customer approved successfully!');
	}

	public function reject($id)
	{
		$customer = Customer::findOrFail($id);
		$customer->delete();

		return back()->with('message', 'Customer rejected successfully!');
	}
}
