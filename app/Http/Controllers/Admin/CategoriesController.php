<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\VendorType;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CategoriesController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:operator');
	}

	public function index()
	{
		$categories = Category::latest()->paginate(25);

		return view('admin.categories.index', compact('categories'));
	}

	public function create()
	{
		$vendorTypes = VendorType::where('status', 1)->get();
		// $parentCategories = Category::whereNull('parent_id')
		// 	->get();

		return view('admin.categories.create', compact('vendorTypes'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'vendor_type' => 'required',
			'name' => 'required|string|max:40',
			'image' => 'required|image|mimes:jpeg,png,jpg|dimensions:min_width=500,min_height=500|min:100|max:4096',
		]);

		if($request->hasfile('image')) {
			$file = $request->file('image');

			if ($file->isValid()) {
				$filename = time() . '.' . $file->extension();

				$sizes = [500, 250, 150];

				foreach ($sizes as $size) {
					$image = Image::make($file);
					$path = "images/categories/{$size}x{$size}/";

					if (!File::isDirectory($path)) {
						File::makeDirectory($path, 0755, true, true);
					}

					$image->resize($size, null, function ($constraint) {
						$constraint->aspectRatio();
					})->save($path . $filename);
				}
			} else {
				// Handle invalid file
				return redirect()
					->back()
					->withErrors(['image' => 'Invalid image file.']);
			}
		}

		$category = new Category;

		$category->vendor_type_id = $request->get('vendor_type');
		$category->name = $request->get('name');
		$category->image = $filename;

		if ($request->input('category'))
		{
			$category->parent_id = $request->input('category');
		}

		$category->save();

		return redirect("/admin/categories")
			->with('message', 'Category added successfully.');
	}

	public function edit($id)
	{
		$category = Category::findOrFail($id);

		$vendorTypes = VendorType::where('status', 1)->get();
		$parentCategories = Category::whereNull('parent_id')
			->get();

		return view('admin.categories.edit', compact('category', 'parentCategories', 'vendorTypes'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'vendor_type' => 'required',
			'name' => 'required|string|max:40',
			'image' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=500,min_height=500|min:100|max:4096',
		]);

		$category = Category::findOrFail($id);

		if($request->hasfile('image'))
		{
			$file = $request->file('image');

			if ($file->isValid()) {
				$filename = time() . '.' . $file->extension();

				$sizes = [500, 250, 150];

				foreach($sizes as $size)
				{
					$image = Image::make($file);
					$path = "images/categories/{$size}x{$size}/";

					if (!File::isDirectory($path)) {
						File::makeDirectory($path, 0755, true, true);
					}

					if ($category->image)
					{
						$oldImage = public_path($path . $category->image);
					}

					$image->resize($size, null, function ($constraint) {
						$constraint->aspectRatio();
					})->save($path . $filename);

					if (isset($oldImage) && file_exists($oldImage))
					{
						unlink($oldImage);
					}
				}
			} else {
				return redirect()
					->back()
					->withErrors(['image' => 'Invalid image file.']);
			}
		}

		$category->vendor_type_id = $request->get('vendor_type');
		$category->name = $request->get('name');
		$category->parent_id = $request->get('category');
		$category->is_mu = $request->get('is_mu');

		if (isset($filename)) {
			$category->image = $filename;
		}

		$category->save();

		return redirect("/admin/categories")
			->with('message', 'Category updated successfully.');
	}

	public function show($id) {}

	public function destroy($id)
	{
		// Condition to be added to check if category is empty
		// before deleting it

		$category = Category::findOrFail($id);
		// $category->delete();

		return redirect()
			->back()
			->with('message', 'Category deleted successfully.');
	}
}
