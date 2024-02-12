<?php
/** this is a resource controller 
and there is another type which is called a REST controller 
**/
namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NsaLeads;

class MobileNsaLeadsController extends Controller
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
	
		
	
			$customer_Leads = new NsaLeads;
			$customer_Leads->name  = $request->get('name');
			$customer_Leads->phone_number  = $request->get('phone_number');       
			$customer_Leads->country  = $request->get('country');        
			$customer_Leads->state  = $request->get('state');        
			$customer_Leads->city  = $request->get('city');        
			$customer_Leads->neighbourhood  = $request->get('neighbourhood');
			
			$customer_Leads->save();
			
			return response()->json(['status' => 200,'data' => $customer_Leads,'message' => 'customer_Leads']);
	}

		
	
	
	
 
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
