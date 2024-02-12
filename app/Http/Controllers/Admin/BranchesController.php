<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branches;
use App\Models\City;
use App\Models\OrderMaster;
use App\Models\Vendor;

class BranchesController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:operator');
	}

	public function index()
	{
		$branches = Branches::where('deleted', 0)
			->get();

		return view('admin.branches.index', compact('branches'));
	}

	public function create()
	{
		$cities = City::all();
		return view('admin.branches.create', compact('cities'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'phone' => 'required|numeric|min:11',
			'city' => 'required',
		]);

		if($request->hasfile('banner')) {
			$file = $request->file('banner');

			if ($file->isValid()) {
				$filename = time() . '.' . $file->extension();

				$file->move('images/branches/banners/', $filename);
			} else {
				// Handle invalid file
				return redirect()->back()->withErrors(['banner' => 'Invalid banner file.']);
			}
		}

		$branch = new Branches;

		$branch->name = $request->get('name');
		$branch->phone = $request->get('phone');
		$branch->city_id = $request->get('city');
		$branch->banner = $filename ?? null;
		$branch->description = $request->get('description') ?? null;

		$branch ->save();

		return redirect()->route('branches.index')->with('message', 'Branch created successfully.');
	}

	public function show($id) {}

	public function edit($id)
	{
		$branch = Branches::findOrFail($id);

		$cities = City::all();

		return view('admin.branches.edit', compact('branch', 'cities'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required',
			'phone' => 'required|numeric|min:11',
			'city' => 'required',
		]);

		$branch =Branches::findOrFail($id);

		if($request->hasfile('banner'))
		{
			$file = $request->file('banner');

			if ($file->isValid()) {
				$filename = time() . '.' . $file->extension();
				
				if ($branch->banner) {
					$oldBanner = public_path('/images/branches/banners/' . $branch->banner);
				}

				$file->move('images/branches/banners/', $filename);

				if (isset($oldBanner) && file_exists($oldBanner)) {
					unlink($oldBanner);
				}
			} else {
				return redirect()
					->back()
					->withErrors(['banner' => 'Invalid banner file.']);
			}
		}

		$branch->name = $request->get('name');
		$branch->phone = $request->get('phone');
		$branch->city_id = $request->get('city');
		if ($request->get('description'))
		{
			$branch->description = $request->get('description');
		}

		if (isset($filename)) {
			$branch->banner = $filename;
		}

		$branch ->save();
	
		return redirect()->route('branches.index')->with('message', 'Branch updated successfully.');
	}

	public function destroy($id)
	{
		$branch = Branches::findOrFail($id);
		$branch->delete();

		return redirect()->route('branches.index')->with('message', 'Branch deleted successfully.');
	}

	public function getBranchOrders($branch)
	{
		$branchOrders = OrderMaster::where('branch_id', $branch)
			->with('customer')
			->latest()
			->paginate(25);

		return view('admin.branches.branch-orders', compact('branchOrders'));
	}

	public function getBranchVendors($branch)
	{
		$branchVendors = Vendor::where('branch_id', $branch)
			->latest()
			->paginate(25);

		return view('admin.branches.branch-vendors', compact('branchVendors'));
	}
}
