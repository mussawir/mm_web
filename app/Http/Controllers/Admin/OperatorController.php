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
			'address_address' => 'required|string',
			'commission_percentage' => 'required|numeric|min:2|max:20',
			'city' => 'required',
			'area_name' => 'required|string',
			'operation_radius' => 'required',
			'operational_area' => 'required',
			'logo' => 'required|image|mimes:jpeg,png,jpg|min:100|max:500',
			'banner' => 'required|image|mimes:jpeg,png,jpg|min:100|max:500',
		]);

		if($request->hasfile('logo')) {
			$file = $request->file('logo');

			if ($file->isValid()) {
				$logo = time() . '.' . $file->extension();

				$file->move('images/operators/logos/', $logo);
			} else {
				return redirect()
					->back()
					->withErrors(['logo' => 'Invalid image file.']);
			}
		}

		if ($request->hasFile('banner')) {
			$file = $request->file('banner');
			if ($file->isValid()) {
				$banner = time() . '.' . $file->extension();

				$file->move('images/operators/banners/', $banner);
			} else {
				return redirect()
					->back()
					->withErrors(['banner' => 'Invalid image file.']);
			}
		}

		$latitude = floatval($request->input('address_latitude'));
		$longitude = floatval($request->input('address_longitude'));
		$selectedCoords = json_encode(['latitude' => $latitude, 'longitude' => $longitude]);

		$operator = new OperatorMaster;

		$operator->name = $request->get('name');
		$operator->company_name = $request->get('company_name');
		$operator->email = $request->get('email');
		$operator->phone = $request->get('phone');
		$operator->logo = $logo;
		$operator->banner = $banner;

		$operator->save();

		if ($operator) {
			$operatorDetails = new OperatorDetail;

			$operatorDetails->operator_id = $operator->id;
			$operatorDetails->city_id = $request->get('city');
			$operatorDetails->address = $request->get('address_address');
			$operatorDetails->commission_percentage = $request->get('commission_percentage');
			$operatorDetails->area_name = $request->get('area_name');
			$operatorDetails->operation_radius = $request->get('operation_radius');
			$operatorDetails->operational_area = $request->get('operational_area');
			$operatorDetails->operation_geo_location = $selectedCoords;

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

		return redirect()->route('operators.index')->with('message', 'Operator added successfully.');
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
		$geoLocation = jsoN_decode($operator->details->operation_geo_location);

		$latitude = $geoLocation->latitude;
		$longitude = $geoLocation->longitude;

		$cities = City::all();

		return view('admin.operators.edit', compact('operator', 'cities', 'latitude', 'longitude'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required|string|min:3',
			'company_name' => 'required|string|min:3',
			'email' => 'required|email|unique:operator_master,email,' . $id,
			'phone' => 'required|numeric',
			'address_address' => 'required|string',
			'commission_percentage' => 'required|numeric|min:2|max:20',
			'city' => 'required',
			'area_name' => 'required|string',
			'operation_radius' => 'required',
			'operational_area' => 'required',
			'logo' => 'image|mimes:jpeg,png,jpg|min:100|max:500',
			'banner' => 'image|mimes:jpeg,png,jpg|min:100|max:500',
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

		if ($operator->email !== $request->get('email')) {
			$operatorLogin = Admin::where('role', 1)
				->where('user_id', $operator->id)
				->firstOrFail();

			$operatorLogin->email = $request->get('email');
			
			$operatorLogin->save();
		}

		$operator->name = $request->get('name');
		$operator->company_name = $request->get('company_name');
		$operator->email = $request->get('email');
		$operator->phone = $request->get('phone');
		
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

			$latitude = $request->get('address_latitude');
			$longitude = $request->get('address_longitude');

			$selectedCoords = json_encode(['latitude' => $latitude, 'longitude' => $longitude]);

			// $operatorDetails->operator_id = $operator->id;
			$operatorDetails->city_id = $request->get('city');
			$operatorDetails->operation_geo_location = $selectedCoords;
			$operatorDetails->address = $request->get('address_address');
			$operatorDetails->commission_percentage = $request->get('commission_percentage');
			$operatorDetails->area_name = $request->get('area_name');
			$operatorDetails->operational_area = $request->get('operational_area');
			$operatorDetails->operation_radius = $request->get('operation_radius');

			$operatorDetails->save();
		}

		return redirect()->route('operators.index')
			->with('message', 'Operator updated successfully!');
	}

	public function destroy($id)
	{
		$operator = OperatorMaster::findOrFail($id);
		
		// Operator can be deleted? Under what conditions?
		// $operator->delete();

		return redirect()->route('operators.index')
			->with('message', 'Operator deleted successfully!');
	}
}
