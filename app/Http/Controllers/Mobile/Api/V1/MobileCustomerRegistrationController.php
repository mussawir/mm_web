<?php
/** this is a resource controller 
and there is another type which is called a REST controller 
**/
namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustRegOtp;

class MobileCustomerRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function index(){
	     $getCustomerList = Customer::get();
	     return response()->json(['status' => 200,'data' => $getCustomerList,'message' => 'Get Customer List Succesfully!.']);
	 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
	
     */
	 
// new registration api function 

public function store(Request $request)
{
    $phone_number = $request->get(trim('phone_number'));
    $name = $request->get('name');
    $pin = $request->get('pin');

    $customer = Customer::where("phone_number", $phone_number)->first();
    if($customer){
        return response()->json(['status' => 500, 'message' => 'Already registered']);
    }

    $customer = new Customer;
    $customer->phone_number = $phone_number;
    $customer->name = $name;
    $customer->pin = $pin;
    $customer->verified_customer = 0;
    $customer->save();

    // generate otp after registration
    $digits = 4;
    $otp =  rand(pow(10, $digits-1), pow(10, $digits)-1);
    $createOtp = new CustRegOtp;
    $createOtp->otp_number  = $otp; 
    $createOtp->customer_id	  = $customer->id;
    $createOtp->save();
    return response()->json(['status' => 200,'message' => 'Otp number']);
}

public function login(Request $request)
{
    $phone_number = $request->get(trim('phone_number'));
    $pin = $request->get('pin');

    $customer = Customer::where("phone_number", $phone_number)->first();

    if(!$customer){
        return response()->json(['status' => 404, 'message' => 'Customer not found.']);
    }

    if($customer->pin != $pin){
        return response()->json(['status' => 500, 'message' => 'Wrong PIN.']);
    }
    $data = [
        'id' => $customer->id,
        'name' => $customer->name,
        'address' => $customer->address,
        'geoLocation' => json_decode($customer->geo_location)
    ];
    return response()->json(['status' => 200,'data' => $data,'message' => 'Login Succesfully!.']);
}
	
	
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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
    public function update($phonenumber)
    {
        $checkPhoneNumber = Customer::where('phone_number','=',$phonenumber)->first();
        
        if($checkPhoneNumber != null){
            $digits = 4;
            $random_unique_no  =  rand(pow(10, $digits-1), pow(10, $digits)-1);  
             $update_pin = Customer::where('phone_number','=',$checkPhoneNumber->phone_number)->update(['pin' => $random_unique_no]);
             return response()->json(['status' => 200,'data' => $random_unique_no,'message' => 'Pin Reset Succesfully!.']);
        }else{
              return response()->json(['status' => 200,'data' => $checkPhoneNumber,'message' => 'Invalid Phone Number!.']);
        }
    }

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
