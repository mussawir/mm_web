<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\City;
use App\Models\OperatorDetail;
use App\Models\OperatorMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OperatorController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:admin');
	}

	public function index()
	{
		$operators = OperatorMaster::latest()
			->with(['details', 'details.city'])
			->get();
		return view('admin.operators.index', compact('operators'));
	}

	public function create()
	{
		$cities = City::all();
		$randomPassword = '12345678';

		return view('admin.operators.create', compact('cities', 'randomPassword'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|string|min:3',
			'company_name' => 'required|string|min:3',
			'email' => 'required|email|unique:operator_master,email',
			'phone' => 'required|numeric',
			'address' => 'required|string',
			'city' => 'required',
			'area_name' => 'required|string',
			'logo' => 'required|image|mimes:jpeg,png,jpg|min:50|max:500',
			// 'banner' => 'required|image|mimes:jpeg,png,jpg|min:100|max:500',
		]);

		if($request->hasfile('logo')) {
			$file = $request->file('logo');

			if ($file->isValid()) {
				$logo = time() . '.' . $file->extension();

				$file->move('images/suppliers/logos/', $logo);
			} else {
				return redirect()
					->back()
					->withErrors(['logo' => 'Invalid image file.']);
			}
		}

		// if ($request->hasFile('banner')) {
		// 	$file = $request->file('banner');
		// 	if ($file->isValid()) {
		// 		$banner = time() . '.' . $file->extension();

		// 		$file->move('images/operators/banners/', $banner);
		// 	} else {
		// 		return redirect()
		// 			->back()
		// 			->withErrors(['banner' => 'Invalid image file.']);
		// 	}
		// }

		// $latitude = floatval($request->input('address_latitude'));
		// $longitude = floatval($request->input('address_longitude'));
		// $selectedCoords = json_encode(['latitude' => $latitude, 'longitude' => $longitude]);

		$operator = new OperatorMaster;

		$operator->name = $request->input('name');
		$operator->company_name = $request->input('company_name');
		$operator->email = $request->input('email');
		$operator->phone = $request->input('phone');
		$operator->logo = $logo;
		// $operator->banner = $banner;

		$operator->save();

		if ($operator) {
			$operatorDetails = new OperatorDetail;

			$operatorDetails->operator_id = $operator->id;
			$operatorDetails->city_id = $request->input('city');
			$operatorDetails->address = $request->input('address');

			$operatorDetails->save();

			if ($operatorDetails) {
				$operatorLogin = new Admin;

				$operatorLogin->user_id = $operator->id;
				$operatorLogin->email = $operator->email;
				$operatorLogin->password = Hash::make($request->get('password'));
				$operatorLogin->role = 1;

				$operatorLogin->save();
			}
		}

		return redirect()->route('operators.index')->with('message', 'Supplier added successfully.');
	}

	public function show($id)
	{
		$operator = OperatorMaster::findOrFail($id);
		return view('admin.operators.show', compact('operator'));
	}

	public function edit($id)
	{
		$operator = OperatorMaster::where('id', $id)
			->with('details')
			->firstOrFail();

		$cities = City::all();

		return view('admin.operators.edit', compact('operator', 'cities'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required|string|min:3',
			'company_name' => 'required|string|min:3',
			'email' => 'required|email|unique:operator_master,email,' . $id,
			'phone' => 'required|numeric',
			'address' => 'required|string',
			'city' => 'required',
			'logo' => 'image|mimes:jpeg,png,jpg|min:100|max:500',
			// 'banner' => 'image|mimes:jpeg,png,jpg|min:100|max:500',
		]);

		$operator = OperatorMaster::findOrFail($id);

		if($request->hasfile('logo')) {
			$file = $request->file('logo');

			if ($file->isValid()) {
				$logo = time() . '.' . $file->extension();
				
				if ($operator->logo) {
					$oldLogo = public_path('images/operators/logos/' . $operator->logo);
				}

				$file->move('images/operators/logos/', $logo);

				if (isset($oldLogo) && file_exists($oldLogo)) {
					unlink($oldLogo);
				}
			} else {
				return redirect()
					->back()
					->withErrors(['image' => 'Invalid image file.']);
			}
		}

		if ($request->hasFile('banner')) {
			$file = $request->file('banner');

			if ($file->isValid()) {
				$banner = time() . '.' . $file->extension();
				
				if ($operator->banner) {
					$oldBanner = public_path('images/operators/banners/' . $operator->banner);
				}

				$file->move('images/operators/banners/', $banner);

				if (isset($oldBanner) && file_exists($oldBanner)) {
					unlink($oldBanner);
				}
			} else {
				return redirect()
					->back()
					->withErrors(['image' => 'Invalid image file.']);
			}
		}

		if ($operator->email !== $request->input('email')) {
			$operatorLogin = Admin::where('role', 1)
				->where('user_id', $operator->id)
				->firstOrFail();

			$operatorLogin->email = $request->input('email');
			
			$operatorLogin->save();
		}

		$operator->name = $request->input('name');
		$operator->company_name = $request->input('company_name');
		$operator->email = $request->input('email');
		$operator->phone = $request->input('phone');

		if (isset($logo)) {
			$operator->logo = $logo;
		}

		if (isset($banner)) {
			$operator->banner = $banner;
		}

		$operator->save();

		if ($operator) {
			$operatorDetails = OperatorDetail::where('operator_id', $operator->id)
				->firstOrFail();

			// $operatorDetails->operator_id = $operator->id;
			$operatorDetails->city_id = $request->input('city');
			$operatorDetails->address = $request->input('address');

			$operatorDetails->save();
		}

		return redirect()->route('operators.index')
			->with('message', 'Supplier updated successfully!');
	}

	public function destroy($id)
	{
		$operator = OperatorMaster::findOrFail($id);
		
		// Operator can be deleted? Under what conditions?
		// $operator->delete();

		return redirect()->route('operators.index')
			->with('message', 'Supplier deleted successfully!');
	}
}
