<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\Items_list;
use App\Models\Favourite_Shop;
use Illuminate\Support\Facades\DB;

class MobileShopsItemsListController extends Controller
{
	public $image_name;

	public function productRemoveItem($id)
	{
		$item = Items_list::find($id)->delete();

		return response()->json([
			'status' => 200,
			'data' => $item,
			'message' => 'Product removed successfully!'
		]);
	}

	public function favouriteStore(Request $request)
	{
		$Favourite_Shop = new Favourite_Shop;
		$Favourite_Shop->shop_id = $request->input('shop_id');
		$Favourite_Shop->customer_id = $request->input('customer_id');
		$Favourite_Shop->save();

		return response()->json([
			'status' => 200,
			'data' => $Favourite_Shop,
			'message' => 'Shop categories retrieved successfully!'
		]);
	}

	public function showCategory($areasubarea)
	{
		$getItemCategory = DB::table('item_categories')
			->join('shops', 'shops.id', '=', 'item_categories.id')
			->select('shops.area','shops.sub_area','item_categories.*')
			->orderBy('sort_by', 'ASC')
			->get();

		return response()->json([
			'status' => 200,
			'data' => $getItemCategory,
			'message' => 'Shop categories retrieved successfully!'
		]);
	}

	public function getAllItemList($vendor)
	{
		$items = Items_list::where('vendor_id', $vendor)
			->where('is_addon', 0)
			->latest()
			->get();

		$items = $items->map(function ($item) {
			$imagePath = "images/branch-products/{$item->branch_id}/150x150/{$item->main_image}";
			$item->main_image = $imagePath;

			return $item;
		});

		if ($items->count()) {
			return response()->json([
				'status' => 200,
				'data' => $items,
				'message' => 'Shop Item List Retrived Successfully.'
			]);
		}
		else {
			return response()->json([
				'status' => 200,
				'data' => $items,
				'message' => 'Shop Item List Is Empty.'
			]);
		}
	}

	/** Musavir 14-2-2023 **/
	/** List of all categories*/
	/** Imam 21-3-2023 **/
	/** List of all categories with Branch id */
	public function getCategories($id)
	{
		$get_Categories_List = Category::where('branch_id', $id)
			->with(['parentCategory' => function ($query) {
				$query->select('id', 'name');
			}])
			->get();

		return response()->json([
			'status' => 200,
			'data' => $get_Categories_List,
			'message' => 'Categories list retrieved successfully!'
		]);
	}

	public function getParentCategories($branchId)
	{
		$parentCategories = Category::where('branch_id', $branchId)
			->whereNull('parent_id')
			->get();
		
		$parentCategories = $parentCategories->map(function ($category) {
			$imagePath = "images/branch-categories/{$category->branch_id}/150x150/{$category->image}";
			$category->image = $imagePath;

			return $category;
		});

		return response()->json([
			'status' => 200,
			'data' => $parentCategories,
			'message' => 'Parent categories fetched successfully.'
		]);
	}

	public function getParentCategoriesByVendorType($vendorType)
	{
		$parentCategories = Category::where('vendor_type_id', $vendorType)
			->whereNull('parent_id')
			->get();
		
		$parentCategories = $parentCategories->map(function ($category) {
			$imagePath = "images/branch-categories/{$category->branch_id}/150x150/{$category->image}";
			$category->image = $imagePath;

			return $category;
		});

		return response()->json([
			'status' => 200,
			'data' => $parentCategories,
			'message' => 'Parent categories fetched successfully.'
		]);
	}

	public function musedCategories($id)
	{
		$getMusedCat = Category::where('branch_id', $id)
			->where('is_mu', '1')
			->get();

		return response()->json([
			'status' => 200,
			'data' => $getMusedCat,
			'message' => 'Most used categories retrieved successfully!'
		]);
	}

	/** Musavir 14-2-2023 **/
	/** List of all items in one category **/
	public function getItemsByCategory($categroyId, $vendorId)
	{
		$categoryItems = Items_list::where('category_id', $categroyId)
			->where('vendor_id', $vendorId)
			->where('is_addon', 0)
			->latest()
			->get();

		return response()->json([
			'status' => 200,
			'data' => $categoryItems,
			'message' => 'Category Items Retrieved Successfully.'
		]);
	}

	public function getItemsByCat($categroyId)
	{
		$categoryItems = Items_list::where('category_id', $categroyId)
			->where('is_addon', 0)
			->latest()
			->get();

		return response()->json([
			'status' => 200,
			'data' => $categoryItems,
			'message' => 'Category Items Retrieved Successfully.'
		]);
	}

	public function show($id)
	{
		$find_items = Items_list::where('shop_id', $id)
			->get();

		return response()->json([
			'status' => 200,
			'data' => $find_items,
			'message' => 'Shop items list retrieved successfully!'
		]);
	}

	public function shopAddItem(Request $request, $shop_id)
	{
		$get_image_name = $_FILES['file_attachment']['name'] ?? null;
		if($get_image_name)
		{
			$target_dir = "images/branch-products/".$shop_id . "/";
			if (!file_exists($target_dir))
			{
				mkdir($target_dir, 0777);
			}

			$target_file =$target_dir . basename($_FILES["file_attachment"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

			// Check if file already exists
			if (file_exists($target_file))
			{
				echo json_encode(
					array(
						"status" => 0,
						"data" => array(),
						"msg" => "Sorry, file already exists."
					)
				);
				die();
			}

			// Check file size
			if ($_FILES["file_attachment"]["size"] > 50000000)
			{
				echo json_encode(
					array(
						"status" => 0,
						"data" => array(),
						"msg" => "Sorry, your file is too large."
					)
				);
				die();
			}

			if (move_uploaded_file($_FILES["file_attachment"]["tmp_name"], $target_file))
			{
				json_encode(
					array(
						"status" => 1,
						"data" => array(),
						"msg" => "File uploaded successfully"
					)
				);
			}
			else
			{
				echo json_encode(
					array(
						"status" => 0,
						"data" => array(),
						"msg" => "Sorry, there was an error uploading your file."
					)
				);
			}
		}

		$shop_logo_url = ($get_image_name) ? '/images/branch-products/'. $shop_id . '/'. $get_image_name : '';
		$shop_additem = new Items_list;
		$shop_additem->branch_id = $request->input('shop_id');
		$shop_additem->category_id = $request->input('category');
		$shop_additem->name = $request->input('name');
		$shop_additem->discription = $request->input('discription');
		$shop_additem->price = $request->input('price');
		$shop_additem->discount = $request->input('discount');
		$shop_additem->main_image = $shop_logo_url;
		$shop_additem->is_addon = $request->input('is_addon');
		$shop_additem->save();

		return response()->json([
			'status' => 200,
			'data' => $shop_additem,
			'message' => 'Item added successfully!',
		]);
	}

	public function getItem($item)
	{
		$item = Items_list::findorFail($item);

		return response()->json([
			'status' => 200,
			'data' => $item,
			'message' => 'Shop Item Retrieved Successfully'
		]);
	}

	public function update(Request $request, $id, $shop_id)
	{
		if(!empty($_FILES['file_attachment']['name']))
		{
			$image_name = $_FILES['file_attachment']['name'];

			$target_dir = "images/branch-products/". $shop_id . "/";

			if (!file_exists($target_dir))
			{
				mkdir($target_dir, 0777);
			}

			$target_file = $target_dir . basename($_FILES["file_attachment"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Check if file already exists
			if (file_exists($target_file))
			{
				echo json_encode(
					array(
						"status" => 0,
						"data" => array(),
						"msg" => "Sorry, file already exists."
					)
				);
				die();
			}

			// Check file size
			if ($_FILES["file_attachment"]["size"] > 50000000)
			{
				echo json_encode(
					array(
						"status" => 0,
						"data" => array(),
						"msg" => "Sorry, your file is too large."
					)
				);
				die();
			}

			if (move_uploaded_file($_FILES["file_attachment"]["tmp_name"], $target_file))
			{
				json_encode(
					array(
						"status" => 1,
						"data" => array(),
						"msg" => "The file " . basename( $_FILES["file_attachment"]["name"]) . " has been uploaded."
					)
				);
			}
			else
			{
				echo json_encode(
					array(
						"status" => 0,
						"data" => array(),
						"msg" => "Sorry, there was an error uploading your file."
					)
				);
			}

			$shop_logo_url = '/images/branch-products/' . $shop_id . '/'. $image_name;
			$update_item = Items_list::where('id', $id)
				->update([
					'name' => $request->input('name'),
					'discription' => $request->input('discription'),
					'discount' => $request->input('discount'),
					'price' => $request->input('price'),
					'main_image' => $shop_logo_url
				]);
		}
		else
		{
			$update_item = Items_list::where('id', $id)
				->update([
					'name' => $request->input('name'),
					'discription' => $request->input('discription'),
					'discount' => $request->input('discount'),
					'price' => $request->input('price')
				]);
		}
		return response()->json([
			'status' => 200,
			'message' => 'Item updated successfully!'
		]);
	}

	public function cloneItem(Request $request, $shop_id)
	{
		$CloneItem = Items_list::where('name', $request->name)
			->get();
		$object = json_decode(json_encode($CloneItem), FALSE);
		// if(Items_list::where('name', $request->name)
		// 	->where('shop_id', $request->shop_id)
		// 	->exists())
		// {
		// 	return response()->json([
		// 		'status' => 300,
		// 		'data' => $request->name,
		// 		'message' => 'You should chose a different name!'
		// 	]);
		// }
		if($object == [] && !empty($_FILES['file_attachment']['name']))
		{
			$product_name = $_FILES['file_attachment']['name'];
			$target_dir = "public/images/shop-products/" . $shop_id . "/";
			if (!file_exists($target_dir))
			{
				mkdir($target_dir, 0777);
			}

			$target_file =$target_dir . basename($_FILES["file_attachment"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

			// Check if file already exists
			if (file_exists($target_file))
			{
				echo json_encode(
					array(
						"status" => 0,
						"data" => array(),
						"msg" => "Sorry, file already exists."
					)
				);
				die();
			}

			// Check file size
			if ($_FILES["file_attachment"]["size"] > 50000000)
			{
				echo json_encode(
					array(
						"status" => 0,
						"data" => array(),
						"msg" => "Sorry, your file is too large."
					)
				);
				die();
			}

			if (move_uploaded_file($_FILES["file_attachment"]["tmp_name"], $target_file))
			{
				// return response()->json([
				// 	'status' => 400,
				// 	'data' => $_FILES,
				// 	'message' => 'File has been uploaded!'
				// ]);

				// echo json_encode(
				// 	array(
				// 		"status" => 1,
				// 		"data" => array(),
				// 		"msg" => "The file " . basename( $_FILES["file_attachment"]["name"]) . " has been uploaded."
				// 	)
				// );
			}
			else
			{
				echo json_encode(
					array(
						"status" => 0,
						"data" => array(),
						"msg" => "Sorry, there was an error uploading your file."
					)
				);
			}

			$product_image = '/images/shop-products/' . $shop_id . '/' . $product_name;
			$shop_cloneitem = new Items_list;
			$shop_cloneitem->shop_id = $request->input('shop_id');
			$shop_cloneitem->name = $request->input('name');
			$shop_cloneitem->discription = $request->input('discription');
			$shop_cloneitem->price = $request->input('price');
			$shop_cloneitem->discount = $request->input('discount');
			$shop_cloneitem->main_image = $product_image;
			$shop_cloneitem->save();

			return response()->json([
				'status' => 400,
				'data' => $shop_cloneitem,
				'message' => 'Great, new clone with new picture is created!'
			]);
		}
		else
		{
			return response()->json([
				'status' => 100,
				'data' => $CloneItem,
				'message' => 'You should chose a different name!'
			]);
		}
	}

	public function fetchCurrency()
	{
		$currencies = Currency::where('status', 1)
			->get();

		if ($currencies)
		{
			return response()->json([
				'status' => 200,
				'data' => $currencies,
				'message' => 'Currency list fetched successfully.'
			]);
		}
		else
		{
			return response()->json([]);
		}
	}
}
