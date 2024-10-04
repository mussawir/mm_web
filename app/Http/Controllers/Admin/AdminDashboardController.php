<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderMaster;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{
	public function index()
	{
		$user = Auth::user();

		if ($user->role == 0) {
			return view('admin.dashboard.dashboard-stats');
		}

		if ($user->role == 1) {
			$orders = OrderMaster::with(['customer', 'vendor'])
			->where('status', 1)
			->where('operator_id', $user->user_id)
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
