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
			'email' => 'required|email|unique:operator_master,email',
			'phone' => 'required|numeric|unique:operator_master,phone',
			'address' => 'required|string',
			'commission_percentage' => 'required|numeric|min:2|max:20',
			'city' => 'required',
			'area_name' => 'required|string',
			'operation_radius' => 'required',
			'operational_area' => 'required',
		]);

		$operator = new OperatorMaster;

		$operator->name = $request->get('name');
		$operator->email = $request->get('email');
		$operator->phone = $request->get('phone');

		$operator->save();

		if ($operator) {
			$operatorDetails = new OperatorDetail;

			$operatorDetails->operator_id = $operator->id;
			$operatorDetails->city_id = $request->get('city');
			$operatorDetails->address = $request->get('address');
			$operatorDetails->commission_percentage = $request->get('commission_percentage');
			$operatorDetails->area_name = $request->get('area_name');
			$operatorDetails->operation_radius = $request->get('operation_radius');
			$operatorDetails->operational_area = $request->get('operational_area');

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

		$cities = City::all();

		return view('admin.operators.edit', compact('operator', 'cities'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required|string|min:3',
			'email' => 'required|email|unique:operator_master,email',
			'phone' => 'required|numeric|unique:operator_master,phone',
			'address' => 'required|string',
			'commission_percentage' => 'required|numeric|min:2|max:20',
			'city' => 'required',
			'area_name' => 'required|string',
			'operation_radius' => 'required',
			'operational_area' => 'required',
		]);

		$operator = OperatorMaster::findOrFail($id);

		if ($operator->email !== $request->get('email')) {
			$operatorLogin = Admin::where('role', 1)
				->where('user_id', $operator->id)
				->firstOrFail();

			$operatorLogin->email = $request->get('email');
			
			$operatorLogin->save();
		}

		$operator->name = $request->get('name');
		$operator->email = $request->get('email');
		$operator->phone = $request->get('phone');

		$operator->save();

		if ($operator) {
			$operatorDetails = OperatorDetail::where('operator_id', $operator->id)
				->firstOrFail();

			$operatorDetails->operator_id = $operator->id;
			$operatorDetails->city_id = $request->get('city');
			$operatorDetails->address = $request->get('address');
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
