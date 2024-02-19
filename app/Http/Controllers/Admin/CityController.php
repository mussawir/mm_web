<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:admin');
	}

	public function index()
	{
		$cities = City::latest()->get();
		return view('admin.cities.index', compact('cities'));
	}

	public function create()
	{
		return view('admin.cities.create');
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|string|min:3',
		]);

		$city = new City;

		$city->name = $request->get('name');

		$city->save();

		return redirect()
			->route('cities.index')
			->with('message', 'City added successfully.');
	}

	public function show($id)
	{
		$city = City::findOrFail($id);
		return view('admin.cities.show', compact('city'));
	}

	public function edit($id)
	{
		$city = City::findOrFail($id);

		return view('admin.cities.edit', compact('city'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required|string|min:3',
		]);

		$city = City::findOrFail($id);

		$city->name = $request->get('name');

		$city->save();

		return redirect()
			->route('cities.index')
			->with('message', 'City updated successfully!');
	}

	public function destroy($id)
	{
		$vendor = City::findOrFail($id);

		// Conditions when a city should be deleted
		// $vendor->delete();

		return redirect()
			->route('cities.index')
			->with('message', 'City deleted successfully!');
	}
}
