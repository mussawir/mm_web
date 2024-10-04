<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupItemList;
use Illuminate\Support\Facades\DB;

class MobileShopItemGroupController extends Controller
{
	public $image_name;
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function createGroup(Request $request, $name)
	{
		
		$grouplist = Group::where('name', '=', $request->name)->get();
		$object = json_decode(json_encode($grouplist), FALSE);
		
		if($object == []){
		$get_image_name = $_FILES['file_attachment']['name'];
		if(!empty($_FILES['file_attachment']['name']))
		  {
			
			$target_dir = "public/images/groups-image/".$name . "/";
			if (!file_exists($target_dir))
			{
			  mkdir($target_dir, 0777);
			}
			$target_file =$target_dir . basename($_FILES["file_attachment"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if file already exists
			if (file_exists($target_file)) {
			  echo json_encode(
				 array(
				  "status" => 0,
				  "data" => array()
				  ,"msg" => "Sorry, file already exists."
				 )
			  );
			  die();
			}
			// Check file size
			if ($_FILES["file_attachment"]["size"] > 50000000) {
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
			  echo json_encode(
				array(
				  "status" => 1,
				  "data" => array(),
				  "msg" => "The file " . 
						  basename( $_FILES["file_attachment"]["name"]) .
						  " has been uploaded."));
			} else {
			  echo json_encode(
				array(
				  "status" => 0,
				  "data" => array(),
				  "msg" => "Sorry, there was an error uploading your file."
				)
			  );
			}
		  }
		$shop_logo_url = 'images/groups-image/'.$name .'/'.$get_image_name;
		
		$create_group = new Group;
		$create_group->shop_id  = $request->input('shop_id');
		$create_group->name  = $request->input('name');
		$create_group->description  = $request->input('description');
		$create_group->image  = $shop_logo_url;
		$create_group->save();
		return response()->json(['status' => 200, 'data' => $create_group, 'message' => 'CreatedGroup Retrived Succesfully']);
		}
		else{
			return response()->json(['status' => 300,'data' => $grouplist,'message' => 'You Are Already CreatedGroup This Name!.' ]);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function groupAddItem($group_id,$item_id)
	{
		$groupAddItem = GroupItemList::create(['item_id' => $item_id,'group_id' => $group_id,]);
		$groupAddItem->save();
		return response()->json(['status' => 200, 'data' => $groupAddItem, 'message' => 'GroupAddItem Retrived Succesfully']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function cloneItem($id)
	{
		// right queery here 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function groupDeleteItem($groupid)
	{
		$getGroupDelete = Group::where('id','=',$groupid)->delete();
		return response()->json(['status' => 200,'data' => $getGroupDelete,'message' => 'GroupDeleted Retrieve SucessFully!.' ]);
	}

	public function getGroupItemList($id)
	{
		$getOrdersShop = DB::table('group_items')
			->join('Items', 'Items.id', '=', 'group_items.item_id')
			->select('Items.*', 'group_items.*')
			->where('group_id', $id)
			->get();

		return response()->json([
			'status' => 200,
			'data' => $getOrdersShop,
			'message' => 'getGroupItemList retrieved successfully!'
		]);
	}

	public function groupRemoveItem($group_id, $item_id)
	{
		$getGroupDeleteItem = GroupItemList::where('id', $item_id)
			->delete();

		return response()->json([
			'status' => 200,
			'data' => $getGroupDeleteItem,
			'message' => 'GroupItemDeleted retrieved successfully!'
		]);
	}

	public function getGroupList($id)
	{
		$getGroupList = Group::where('shop_id', $id)
			->get();

		return response()->json([
			'status' => 200,
			'data' => $getGroupList,
			'message' => 'GroupList retrieved successfully!'
		]);
	}
		
	public function editGroup(Request $request, $groupid, $name1)
	{
		if(!empty($_FILES['file_attachment']['name']))
		{
			$image_name = $_FILES['file_attachment']['name'];

			$target_dir = "public/images/shop-products/" . $name1 . "/";
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
				echo json_encode(
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

			$shop_logo_url1 = 'images/shop-products/' . $name1 . '/' .$image_name;
			$update_item = Group::where('id', $groupid)
				->update([
					'name' => $request->input('name'),
					'description' => $request->input('description'),
					'image' => $shop_logo_url1
				]);
		}
		else
		{
			$update_item = Group::where('id', $groupid)
				->update([
					'name' => $request->input('name'),
					'description' => $request->input('description')
				]);
		}

		return response()->json([
			'status' => 200,
			'data' => $update_item,
			'message' => 'Item edited successfully!'
		]);
	}
}
