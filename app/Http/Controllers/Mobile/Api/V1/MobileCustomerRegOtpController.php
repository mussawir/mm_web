<?php
/** this is a resource controller 
and there is another type which is called a REST controller 
**/
namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustRegOtp;



class MobileCustomerRegOtpController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	 
	 /**
	 Used to get generated OTP for showing on otp demo screen 
	 **/
	 
	 public function showCustRegOtp($cid){
	 //    $CustRegOtpList = CustRegOtp::get();
	 //    return response()->json(['status' => 200,'data' => $CustRegOtpList,'message' => 'Get Customer List Succesfully!.']);
	$checkOtp = CustRegOtp::where("customer_id", "=", $cid)->get();
		
	if(count($checkOtp) > 0){
	
	return response()->json(['status' => 200,'data' => $checkOtp,"message" => 'Succesfully!.']); 
	 }else{
	return response()->json(['status' => 500,'data' => "Someting went wrong",'message' => 'Try again!.']); 
	 }
	 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	
	 */
	
	public function checkOtp(Request $request)
	{
		$phone_number = $request->get(trim('phone_number'));
		$otp = $request->get(trim('otp'));
		
		$customer = Customer::where("phone_number", "=", trim($phone_number))->first();
		
		if($customer){
			$checkOtp = CustRegOtp::where("customer_id", $customer->id)->where("otp_number", $otp)->first();
			if($checkOtp){
				$checkOtp->delete();
				$customer->verified_customer = 1;
				$customer->save();
				return response()->json(['status' => 200, 'data' => $customer->id, 'message' => 'Successfully verified OTP.']);
			}else{
				return response()->json(['status' => 500, 'data' => "Wrong OTP", 'message' => 'Please try again.']);  
			}
		}else{
			return response()->json(['status' => 404, 'message' => 'Customer not found.']); 
		}

	}
	
	 //Shahrukh 28/3/23 Check Number 
	 public function checkNumber(Request $request,)  
	{	
		$phone_number = $request->get(trim('phone_number'));
	  	$customer = Customer::where("phone_number", "=", trim($phone_number))->first();  

		if($customer){      
			if($customer->verified_customer == 1){
				return response()->json(['status' => 200, 'message' => 'Already registered Login using PIN']);
			}else{
				$digits = 4;
				$otp = rand(pow(10, $digits-1), pow(10, $digits)-1);

				$existingOtp = CustRegOtp::where('customer_id', $customer->id)->first();

				if ($existingOtp) {
					$existingOtp->otp_number = $otp;
					$existingOtp->save();
				} else {
					$createOtp = new CustRegOtp;
					$createOtp->otp_number = $otp;
					$createOtp->customer_id = $customer->id;
					$createOtp->save();
				}
				return response()->json(['status' => 201, 'message' => 'Already registered But Not verified.']);
			}
			return response()->json(['status' => 200,'data' => $customer->verified_customer, 'message' => 'Already registered Login using PIN']);
		}else{
			return response()->json(['status' => 500,'message' => 'Not Match Number!.']);       
		}
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
/**   
 
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */

  
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
