<?php

namespace App\Http\Controllers\ShopKeeper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Items_list;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Imports\ItemsListImport;
use Maatwebsite\Excel\Facades\Excel;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $shops = Shop::get();
        return response()->json(['status' => 200,'data' => $shops,'message' => 'Shops Retrieve Scuessfully']);
    }
    
    public function showProductList(){
     $id = Auth::id();
     $get_products = Items_list::where('shop_id','=',$id)->get();
     return view('shop.uploadBulkProducts',compact('get_products','id'));
    }
    
    public function storeItems(Request $request,$id)
    {
        $shop_id = $id;
        $items = DB::table('items_lists')->where('shop_id','=',$shop_id)->delete();
        if($items > 0)
        {
            $excel = Excel::import(new ItemsListImport($shop_id), $request->file('myFile'));
        }
        else
        {
            $excel = Excel::import(new ItemsListImport($shop_id), $request->file('myFile'));
        }
        return back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
