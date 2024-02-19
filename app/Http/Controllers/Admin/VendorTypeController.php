<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VendorType;
use Illuminate\Http\Request;

class VendorTypeController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:admin');
	}

	public function index()
	{
		$vendorTypes = VendorType::latest()->get();
		return view('admin.vendor-types.index', compact('vendorTypes'));
	}

	public function create()
	{
		return view('admin.vendor-types.create');
	}

	public function store(Request $request)
	{
		$request->validate([
			'type_name' => 'required|string|min:3',
			'is_food' => 'required|numeric',
		]);

		$vendorType = new VendorType;

		$vendorType->type_name = $request->get('type_name');
		$vendorType->is_food = $request->get('is_food');
		$vendorType->status = 1;

		$vendorType->save();

		return redirect()
			->route('vendorTypes.index')
			->with('message', 'Vendor type added successfully.');
	}

	public function show($id)
	{
		$vendorType = VendorType::findOrFail($id);
		return view('admin.vendor-types.show', compact('vendorType'));
	}

	public function edit($id)
	{
		$vendorType = VendorType::findOrFail($id);
		return view('admin.vendor-types.edit', compact('vendorType'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'type_name' => 'required|string|min:3',
			'is_food' => 'required|numeric',
		]);

		$vendorType = VendorType::findOrFail($id);

		$vendorType->type_name = $request->get('type_name');
		$vendorType->is_food = $request->get('is_food');

		$vendorType->save();

		return redirect()
			->route('vendorTypes.index')
			->with('message', 'Vendor type updated successfully!');
	}

	public function destroy($id)
	{
		$vendorType = VendorType::findOrFail($id);
		$vendorType->delete();

		return redirect()->route('vendorTypes.index')
			->with('message', 'Vendor type deleted successfully!');
	}
}
