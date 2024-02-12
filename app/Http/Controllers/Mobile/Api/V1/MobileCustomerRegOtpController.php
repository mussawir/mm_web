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
	
	public function checkOtp($cid, $otp)
	{
		$checkOtp = CustRegOtp::where("customer_id", $cid)
			->where("otp_number", $otp)
			->get();
			
		if(count($checkOtp) > 0)
		{
			$update_Status = Customer::where('id', $cid)
				->update(['verified_customer'=>'1']);
		
			return response()->json([
				'status' => 200,
				'data' => $checkOtp,
				'message' => 'Succes!'
			]);
		}
		else
		{
			return response()->json([
				'status' => 500,
				'data' => $checkOtp,
				'message' => 'Try again!'
			]);
		}
	}
	
	 //Shahrukh 28/3/23 Check Number 
	 public function checkNumber($phone_number)  
	{	
  //return response()->json(['status' => 200,'data' => $phone_number,'message' => 'Succesfully!.']);
	  	
	  $checkNumber = Customer::where("phone_number", "=", trim($phone_number))->first();  
	  
	  return response()->json(['status' => 200,'data' => $checkNumber,'message' => 'Succesfully!.']);
		if(count($checkNumber) >0){      
		return response()->json(['status' => 200,'data' => $checkNumber,'message' => 'Succesfully!.']);
		}else{
			 return response()->json(['status' => 500,'data' => $checkNumber,'message' => 'Not Match Number!.']);       
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
