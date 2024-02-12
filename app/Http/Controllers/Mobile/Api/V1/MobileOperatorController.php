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
use Carbon\Carbon;
class MobileOperatorController extends Controller
{

	public function operatorLogin(Request $request)
	{
		if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
		{
			$user = Auth::guard('admin')->user();

			if ($user->role == 1) {
				return response()->json([
					'status' => 200,
					'data' => $user,
					'message' => 'Operator login successfully.'
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

public function dashboardStats(Request $request)
{
    $startDate = Carbon::parse($request->input('startDate'))->format('Y-m-d');
    $endDate = $request->input('endDate') ? Carbon::parse($request->input('endDate'))->format('Y-m-d') : null;

    $query = OrderMaster::whereDate('created_at', '>=', $startDate);
    

    if ($endDate) {
        $query->whereDate('created_at', '<=', $endDate);
    }


    $todayTotalOrders = clone $query;
    $RunningOrders = clone $query;
    $todayCompletedOrders = clone $query;
    $todayCanceledOrders = clone $query;
    $totalOrderAmount = clone $query;
    $preparingOrders = clone $query;
    $ordersDelivering = clone $query;
    $ordersCommission = clone $query;


    
    $todayOrders = $todayTotalOrders->count();
    $RunningOrders = $RunningOrders->whereIn('status', [1, 2, 3, 4])->count();
    $todayCompletedOrders = $todayCompletedOrders->whereIn('status', [5, 6])->count();
    $todayCanceledOrders = $todayCanceledOrders->whereIn('status', [7, 8])->count();
    $preparingOrders = $preparingOrders->where('status', 2)->count();
    $ordersDelivering = $ordersDelivering->where('status', 4)->count();
    $totalOrderAmount = $totalOrderAmount->whereIn('status', [5, 6])->sum('grand_total');
    $ordersCommission = $ordersCommission->whereIn('status',[5, 6])->sum('operator_commission');
    $res = $query->whereIn('status',[5,6])->get();
    
    $stats = [
        'todayTotalOrders' => $todayOrders,
        'runningOrders' => $RunningOrders,
        'todayCompletedOrders' => $todayCompletedOrders,
        'todayCanceledOrders' => $todayCanceledOrders,
        'totalOrderAmount' => $totalOrderAmount,
        'preparingOrders' => $preparingOrders,
        'ordersDelivering' => $ordersDelivering,
        'ordersCommission' => $ordersCommission,
        'check' => $res,
    ];

    return response()->json([
        'status' => 200,
        'data' => $stats,
        'message' => $startDate . ' to ' . ($endDate ?? 'today'),
    ]);
}



    public function numberOfVendors()
    {

        $numberOfVendors = Vendor::count();
        return response()->json([
            'status' => 200,
            'data' => $numberOfVendors,
            'message' => 'Number of vendors.'
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
    public function vendorStats(Request $request)
    {
        $vendorId = $request->input('vendorId');
        $startDate = Carbon::parse($request->input('startDate'))->format('Y-m-d');
        $endDate = $request->input('endDate') ? Carbon::parse($request->input('endDate'))->format('Y-m-d') : null;

        $query = OrderMaster::where('vendor_id', $vendorId)->whereDate('created_at', '>=', $startDate);
    

    if ($endDate) {
        $query->whereDate('created_at', '<=', $endDate);
    }


    $todayTotalOrders = clone $query;
    $RunningOrders = clone $query;
    $todayCompletedOrders = clone $query;
    $todayCanceledOrders = clone $query;
    $totalOrderAmount = clone $query;
    $preparingOrders = clone $query;
    $ordersDelivering = clone $query;
    $ordersCommission = clone $query;
    $ordersWaitingApproval = clone $query;

    
    $todayOrders = $todayTotalOrders->count();
    $RunningOrders = $RunningOrders->whereIn('status', [1, 2, 3, 4])->count();
    $todayCompletedOrders = $todayCompletedOrders->whereIn('status', [5, 6])->count();
    $todayCanceledOrders = $todayCanceledOrders->whereIn('status', [7, 8])->count();
    $preparingOrders = $preparingOrders->where('status', 2)->count();
    $ordersDelivering = $ordersDelivering->where('status', 4)->count();
    $totalOrderAmount = $totalOrderAmount->whereIn('status', [5, 6])->sum('grand_total');
    $ordersCommission = $ordersCommission->whereIn('status',[5, 6])->sum('operator_commission');
    $ordersWaitingApproval = $ordersWaitingApproval->where('status', 1)->count();
    
    $stats = [
        'todayTotalOrders' => $todayOrders,
        'runningOrders' => $RunningOrders,
        'todayCompletedOrders' => $todayCompletedOrders,
        'todayCanceledOrders' => $todayCanceledOrders,
        'totalOrderAmount' => $totalOrderAmount,
        'preparingOrders' => $preparingOrders,
        'ordersDelivering' => $ordersDelivering,
        'ordersCommission' => $ordersCommission,
        'ordersWaitingApproval' => $ordersWaitingApproval,
    ];

    return response()->json([
        'status' => 200,
        'data' => $stats,
        'message' => $startDate . ' to ' . ($endDate ?? 'today'),
    ]);

    }


}
