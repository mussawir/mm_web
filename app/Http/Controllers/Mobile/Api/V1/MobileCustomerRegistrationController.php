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
	 
	 public function store(Request $request)
    {
		
		//return response()->json(['status' => 201,'data' => $request->phone_number,'message' => "Already registered"]);
		
         $registerNumber = Customer::where('phone_number', '=', trim($request->phone_number))->get();
		
		 
		 if(count($registerNumber) > 0){
		
			//Update customer registration or login otp
			$digits = 4;
            $otp =  rand(pow(10, $digits-1), pow(10, $digits)-1);
			$result = CustRegOtp::where('customer_id', '=', trim($registerNumber[0]->id))->update(["otp_number" => $otp]);
			return response()->json(['status' => 200,'data' => [$registerNumber[0]->id, $otp],'message' => 'Otp number']);
		 } else{
	        $create_customer = new Customer;
            $create_customer->phone_number  = $request->get(trim('phone_number'));
            $create_customer->street  = $request->get('street');       
            $create_customer->house_number  = $request->get('house_number');
            $create_customer->name  = $request->get('name');        
            $create_customer->save();
			$digits = 4;
			$otp =  rand(pow(10, $digits-1), pow(10, $digits)-1);
			
			$createOtp = new CustRegOtp;
			$createOtp->otp_number  = $otp; 
			$createOtp->customer_id	  = $create_customer->id;
			$createOtp->save();
			return response()->json(['status' => 200,'data' => [$create_customer->id, $otp],'message' => 'Otp number']);
	}
return response()->json(['status' => 201,'data' => $registerNumber ,'message' => "Already registered"]);
		
    }
	
	
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
/**   
   public function store(Request $request)
    {
         $updateOrder = Customer::where('phone_number', '=',$request->phonenumber)->get();
         $object = json_decode(json_encode($updateOrder), FALSE);
         
        if($object == []){
           
            $digits = 4;
            $random_unique_no  =  rand(pow(10, $digits-1), pow(10, $digits)-1);
            $createuser = new Customer;
            $createuser->name  = $request->input('name');
            $createuser->phone_number  = $request->input('phonenumber');
            $createuser->house_number  = $request->input('housenumber');
            $createuser->street  = $request->input('street');
            $createuser->geo_location  = $request->input('geo_location');
            $createuser->city  = $request->input('city');
            $createuser->area  = $request->input('area');
            $createuser->sub_area  = $request->input('subArea');
            $createuser->address  = $request->input('address');        
            $createuser->pin  = $random_unique_no;
          if($createuser->save())
        {
            $ordermaster = new OrderMaster;
            $ordermaster->customer_name = $createuser->name;
            $ordermaster->customer_id = $createuser->id;
            $ordermaster->shop_id = $request->input('shopId');
            $ordermaster->grand_total = $request->input('totalAmount');
            $ordermaster->item_quantity = $request->input('totalQty');
            $ordermaster->save();
        //  dd('if');
            return response()->json(['status' => 200,'data' => [$createuser,$ordermaster->id],'message' => 'Customer Created Successfully.']);
        }
        else
        {
            return response()->json(['status' => 404, 'message' => 'Something Went Wrong!']);
        }
        }else{
            
        $ordermaster = new OrderMaster;
        $ordermaster->customer_name = $object[0]->name;
        $ordermaster->customer_id = $object[0]->id;
        $ordermaster->shop_id = $request->input('shopId');
        $ordermaster->grand_total = $request->input('totalAmount');
        $ordermaster->item_quantity = $request->input('totalQty');
        $ordermaster->save();
        return response()->json(['status' => 200,'data' => [$object,$ordermaster->id],'message' => 'Customer Created Successfully.']);
        // dd($object);
        }
    }
**/
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
