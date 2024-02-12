<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;

class MobileShopKeeperController extends Controller
{

	public function index()
	{
		//
	}

	public function create()
	{
		//
	}

	public function store(Request $request)
	{
		//
	}

	public function show($id)
	{
		$shops = Shop::find($id);
		return response()->json([
			'status' => 200,
			'data' => $shops,
			'message' => 'Shops retrieved successfully!'
		]);

	}

	public function edit($id)
	{
		//
	}

	public function update(Request $request, $id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}
}
