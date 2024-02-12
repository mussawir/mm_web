<?php

namespace App\Http\Controllers\Mobile\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\DealDetail;
use App\Models\DealMaster;
use App\Models\DealOption;
use Illuminate\Http\Request;

class MobileShopDealController extends Controller
{
	public function index($vendorId)
	{
		// updated this api for fetching deals for vendor app
		$deals = DealMaster::where('vendor_id', $vendorId)
			->where('status', 1)
			->with('items.item', 'items.dealOptions.item')
			->get();

		$deals = $deals->map(function ($deal) {
			$dealBannerPath = "images/deal-banners/{$deal->branch_id}/250x250/{$deal->banner}";
			$deal->banner = $dealBannerPath;

			$deal->items = $deal->items->map (function ($dealItem) {
				$dealItem->item->image = 'Sad';
			});

			// $deal->items->transform(function ($dealItem) {
			// 	$imgPath = "images/branch-categories/{$dealItem->item->branch_id}/150x150/{$dealItem->item->image}";
			// 	$dealItem->item->image = $imgPath;

			// 	$dealItem->dealOptions->transform(function ($dealOption) {
			// 		$itemImage = "images/branch-products/";
			// 		$dealOption->item->item_image = $itemImage;

			// 		return $dealOption;
			// 	});

			// 	return $dealItem;
			// });

			return $deal;
		});

		if ($deals->count())
		{
			return response()->json([
				'status' => 200,
				'data' => $deals,
				'message' => 'Deal list retrieved successfully.'
			]);
		}

		return response()->json([]);
	}

	public function addDeal(Request $request, $branch)
	{
		$deal = new DealMaster;
		$banner = "";
		if ($request->hasFile('banner')) {
			$file = $request->file('banner');
			$extension = $file->getClientOriginalExtension();
			$directory = 'images/deal-banners/' . $branch.'/';
			$filename = time() . '.' . $extension;
			$path = $file->move($directory, $filename);
			$banner = '/' . $path;
		}

		$deal->name = $request->input('name');
		$deal->description = $request->input('description');
		$deal->offer = $request->input('discount');
		$deal->grand_total = $request->input('price');
		$deal->start_date = $request->input('startDate');
		$deal->end_date = $request->input('endDate');
		$deal->branch_id = $request->input('branch_id');
		$deal->banner = $banner;
		$deal->status = 1;

		$deal->save();

		if ($deal)
		{
			$items = json_decode($request->input('itemsWithVariations'), true);
			// Loop through the selected menu items and their quantities
			foreach ($items as $item)
			{
				$quantity = $item['quantity'];

				if ($quantity)
				{
					$dealDetails = new DealDetail;

					$dealDetails->deal_id = $deal->id;
					$dealDetails->item_type_id = $item['category']['id'];
					$dealDetails->quantity = $quantity;
					$dealDetails->item_type_name = $item['category']['name'];
					$dealDetails->save();

					if ($dealDetails && is_array($item['items']))
					{
						foreach($item['items'] as $list)
						{
							$dealOptions = new DealOption;
							
							$dealOptions->deal_id = $deal->id;
							$dealOptions->deal_detail_id = $dealDetails->id;
							$dealOptions->item_id = $list['id'];
							$dealOptions->item_name = $list['name'];
							$dealOptions->item_description = $list['discription'];
							$dealOptions->item_image = $list['main_image'];
							$dealOptions->item_original_price = $list['price'];

							if ($list['additionalPrice'] ?? null)
							{
								$dealOptions->deal_price = $list['additionalPrice'];
							}
							else
							{
								$dealOptions->deal_price = 0;
							}

							$dealOptions->save();
						}
					}
				}
			}
		}

		return response()->json([
			'status' => 200,
			'data' => $deal,
			'message' => 'Deal added successfully!'
		]);
	}

	public function getDeal($id)
	{
		$deal = DealMaster::where('id', $id)
			->with('items','items.dealOptions', 'addons')
			->first();

		return response()->json([
			'status' => 200,
			'data' => $deal,
			'message' => 'Deal fetched successfully.'
		]);
	}


	public function updateDeal(Request $request, $id, $branch)
	{
		$deal = DealMaster::where('id', $id)
			->where('branch_id', $branch)
			->first();

		if($deal == null)
		{
			return response()->json([
				'status' => 404,
				'message' => 'Deal not found'
			]);
		}

		$banner = $deal->banner ?? "";

		if($request->hasfile('banner'))
		{
			$file = $request->file('banner');
			$extension = $file->getClientOriginalExtension();
			$directory = 'images/deal-banners/' . $branch.'/';
			$filename = time() . '.' . $extension;
			$path = $file->move($directory, $filename);
			$banner = '/' . $path;
		}
		$deal->name = $request->input('name');
		$deal->description = $request->input('description');
		$deal->offer = $request->input('discount');
		$deal->grand_total = $request->input('price');
		$deal->start_date = $request->input('startDate');
		$deal->end_date = $request->input('endDate');
		$deal->branch_id = $branch;
		$deal->banner = $banner;
		$deal->status = 1;
		$deal->save();
		if($deal)
		{
			DealDetail::where('deal_id', $deal->id)->delete();
			$items = json_decode($request->input('itemsWithVariations',true));
			DealOption::where('deal_id', $deal->id)->delete();
			
			
			foreach($items as $item)
			{
				$quantity = $item->quantity;

				if($quantity)
				{
					$dealDetails = new DealDetail;
					$dealDetails->deal_id = $deal->id;
					$dealDetails->item_type_id = $item->category->id;
					$dealDetails->item_type_name = $item->category->name;
					$dealDetails->quantity = $quantity;


					$dealDetails->save();


					if (is_array($item->items) && count($item->items))
					{
						
						
						foreach ($item->items as $dealOption)
						{
							$dealOptions = new DealOption;
							$dealOptions->deal_id = $deal->id;
							$dealOptions->deal_detail_id = $dealDetails->id;
							$dealOptions->item_id = $dealOption->id;
							$dealOptions->item_name = $dealOption->name;
							$dealOptions->item_description = $dealOption->discription;
							$dealOptions->item_image = $dealOption->main_image;
							$dealOptions->item_original_price = $dealOption->price;
							if($dealOption->additionalPrice ?? null)
							{
								$dealOptions->deal_price = $dealOption->additionalPrice;
							}
							else
							{
								$dealOptions->deal_price = 0;
							}
							$dealOptions->save();
						}
					}
				}
			}
		}

		return response()->json([
			'status' => 200,
			'message' => 'Deal updated successfully!'
		]);

	}

	public function removeDeal($id, $branch)
	{
		return response()->json([
			'status' => 200,
			'data' => 'Funny Data Here',
			'message' => 'Deal removed successfully.'
		]);
	}
}
