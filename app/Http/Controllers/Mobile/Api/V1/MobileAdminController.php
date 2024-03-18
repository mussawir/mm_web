<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\OrderMaster;
use App\Models\OrderDetails;
use App\Models\OrderDealOption;
use App\Models\OrderAddon;
use App\Models\Vendor;
use App\Models\OperatorMaster;
use App\Models\OperatorPaymentMaster;
use Carbon\Carbon;



class MobileAdminController extends Controller
{
    public function adminLogin(Request $request)
	{
		if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
		{
			$user = Auth::guard('admin')->user();

			if ($user->role == 0) {
				return response()->json([
					'status' => 200,
					'data' => $user,
					'message' => 'Admin login successfully.'
				]);
			} else {
				Auth::guard('admin')->logout();
				return response()->json(['data' => 'Unauthorized'], 403);
			}
		}
		else
		{
			return response()->json(['data'=>'Unauthorized'], 404);
		}
	}
    public function adminStats(Request $request)
    {
        $startDate = Carbon::parse($request->input('startDate'))->format('Y-m-d');
        $endDate = $request->input('endDate') ? Carbon::parse($request->input('endDate'))->format('Y-m-d') : null;

        $query = OrderMaster::whereDate('created_at', '>=', $startDate);

        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }
    

        $receivedPayments = OperatorPaymentMaster::get();

        $numOfVendors = Vendor::get()->count();

        $numOfOperators = OperatorMaster::get()->count();

        $totalOrders = clone $query;
        $ordersTotalAmount = clone $query;
        $totalOrdersCommission = clone $query;


        $totalCompletedOrders = $totalOrders->whereIn('status', [5, 6])->count();
        $totalCancelledOrders = $totalOrders->whereIn('status', [7, 8])->count();
        $ordersTotalAmount = $ordersTotalAmount->whereIn('status', [5, 6])->sum('grand_total');
        $totalOrdersCommission = $totalOrdersCommission->whereIn('status', [5, 6])->sum('admin_commission');
        $receivedPayments = $receivedPayments->sum('amount');
        $remainingAmount = $totalOrdersCommission - $receivedPayments;


        $stats = [
            'totalCompletedOrders' => $totalCompletedOrders,
            'totalCancelledOrders' => $totalCancelledOrders,
            'ordersTotalAmount' => $ordersTotalAmount,
            'totalOrdersCommission' => $totalOrdersCommission,
            'receivedPayments' => $receivedPayments,
            'remainingAmount' => $remainingAmount,
            'numOfVendors' => $numOfVendors,
            'numOfOperators' => $numOfOperators
        ];
        return response()->json([
            'status' => 200,
            'data' => $stats,
            'message' => 'admin stats',
        ]);
    }
    public function vendorsList()
    {
        $vendors = Vendor::get();

        return response()->json([
            'status' => 200,
            'data' => $vendors,
            'message' => 'Vendors List Fetched Successfully'
        ]);
    }

    public function operatorsList()
    {
        $operators = OperatorMaster::with('details')->get();

        return response()->json([
            'status' => 200,
            'data' => $operators,
            'message' => 'Operators List Fetched Successfully'
        ]);
    }

}