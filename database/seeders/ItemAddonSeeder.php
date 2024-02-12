<?php

namespace Database\Seeders;

use App\Models\ItemAddon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemAddonSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		ItemAddon::truncate();

		$itemAddons = array(
			array(
				"id" => 114,
				"item_id" => 282,
				"addon_id" => 283,
				"status" => 1,
				"created_at" => "2023-08-18 13:25:31",
				"updated_at" => "2023-08-18 13:25:31",
			),
			array(
				"id" => 115,
				"item_id" => 282,
				"addon_id" => 284,
				"status" => 1,
				"created_at" => "2023-08-18 13:25:31",
				"updated_at" => "2023-08-18 13:25:31",
			),
			array(
				"id" => 116,
				"item_id" => 282,
				"addon_id" => 286,
				"status" => 1,
				"created_at" => "2023-08-18 13:25:31",
				"updated_at" => "2023-08-18 13:25:31",
			),
			array(
				"id" => 117,
				"item_id" => 280,
				"addon_id" => 285,
				"status" => 1,
				"created_at" => "2023-08-24 07:30:25",
				"updated_at" => "2023-08-24 07:30:25",
			),
			array(
				"id" => 118,
				"item_id" => 280,
				"addon_id" => 286,
				"status" => 1,
				"created_at" => "2023-08-24 07:30:25",
				"updated_at" => "2023-08-24 07:30:25",
			),
			array(
				"id" => 122,
				"item_id" => 304,
				"addon_id" => 283,
				"status" => 1,
				"created_at" => "2023-10-12 12:37:01",
				"updated_at" => "2023-10-12 12:37:01",
			),
			array(
				"id" => 123,
				"item_id" => 304,
				"addon_id" => 286,
				"status" => 1,
				"created_at" => "2023-10-12 12:37:01",
				"updated_at" => "2023-10-12 12:37:01",
			),
			array(
				"id" => 124,
				"item_id" => 304,
				"addon_id" => 287,
				"status" => 1,
				"created_at" => "2023-10-12 12:37:01",
				"updated_at" => "2023-10-12 12:37:01",
			),
			array(
				"id" => 125,
				"item_id" => 303,
				"addon_id" => 283,
				"status" => 1,
				"created_at" => "2023-10-12 12:39:11",
				"updated_at" => "2023-10-12 12:39:11",
			),
			array(
				"id" => 126,
				"item_id" => 303,
				"addon_id" => 285,
				"status" => 1,
				"created_at" => "2023-10-12 12:39:11",
				"updated_at" => "2023-10-12 12:39:11",
			),
			array(
				"id" => 127,
				"item_id" => 303,
				"addon_id" => 286,
				"status" => 1,
				"created_at" => "2023-10-12 12:39:11",
				"updated_at" => "2023-10-12 12:39:11",
			),
			array(
				"id" => 128,
				"item_id" => 303,
				"addon_id" => 288,
				"status" => 1,
				"created_at" => "2023-10-12 12:39:11",
				"updated_at" => "2023-10-12 12:39:11",
			),
			array(
				"id" => 129,
				"item_id" => 302,
				"addon_id" => 285,
				"status" => 1,
				"created_at" => "2023-10-12 12:40:03",
				"updated_at" => "2023-10-12 12:40:03",
			),
			array(
				"id" => 130,
				"item_id" => 302,
				"addon_id" => 286,
				"status" => 1,
				"created_at" => "2023-10-12 12:40:03",
				"updated_at" => "2023-10-12 12:40:03",
			),
			array(
				"id" => 131,
				"item_id" => 301,
				"addon_id" => 283,
				"status" => 1,
				"created_at" => "2023-10-12 12:40:22",
				"updated_at" => "2023-10-12 12:40:22",
			),
			array(
				"id" => 132,
				"item_id" => 301,
				"addon_id" => 288,
				"status" => 1,
				"created_at" => "2023-10-12 12:40:22",
				"updated_at" => "2023-10-12 12:40:22",
			),
			array(
				"id" => 133,
				"item_id" => 300,
				"addon_id" => 283,
				"status" => 1,
				"created_at" => "2023-10-12 12:40:39",
				"updated_at" => "2023-10-12 12:40:39",
			),
			array(
				"id" => 134,
				"item_id" => 300,
				"addon_id" => 286,
				"status" => 1,
				"created_at" => "2023-10-12 12:40:39",
				"updated_at" => "2023-10-12 12:40:39",
			),
			array(
				"id" => 135,
				"item_id" => 300,
				"addon_id" => 287,
				"status" => 1,
				"created_at" => "2023-10-12 12:40:39",
				"updated_at" => "2023-10-12 12:40:39",
			),
			array(
				"id" => 136,
				"item_id" => 299,
				"addon_id" => 283,
				"status" => 1,
				"created_at" => "2023-10-12 12:40:45",
				"updated_at" => "2023-10-12 12:40:45",
			),
			array(
				"id" => 137,
				"item_id" => 299,
				"addon_id" => 287,
				"status" => 1,
				"created_at" => "2023-10-12 12:40:45",
				"updated_at" => "2023-10-12 12:40:45",
			),
			array(
				"id" => 138,
				"item_id" => 298,
				"addon_id" => 283,
				"status" => 1,
				"created_at" => "2023-10-12 12:40:49",
				"updated_at" => "2023-10-12 12:40:49",
			),
			array(
				"id" => 139,
				"item_id" => 297,
				"addon_id" => 283,
				"status" => 1,
				"created_at" => "2023-10-12 12:40:53",
				"updated_at" => "2023-10-12 12:40:53",
			),
			array(
				"id" => 140,
				"item_id" => 296,
				"addon_id" => 283,
				"status" => 1,
				"created_at" => "2023-10-12 12:40:58",
				"updated_at" => "2023-10-12 12:40:58",
			),
			array(
				"id" => 141,
				"item_id" => 292,
				"addon_id" => 283,
				"status" => 1,
				"created_at" => "2023-10-12 12:41:07",
				"updated_at" => "2023-10-12 12:41:07",
			),
			array(
				"id" => 142,
				"item_id" => 292,
				"addon_id" => 284,
				"status" => 1,
				"created_at" => "2023-10-12 12:41:07",
				"updated_at" => "2023-10-12 12:41:07",
			),
			array(
				"id" => 143,
				"item_id" => 292,
				"addon_id" => 285,
				"status" => 1,
				"created_at" => "2023-10-12 12:41:07",
				"updated_at" => "2023-10-12 12:41:07",
			),
			array(
				"id" => 147,
				"item_id" => 291,
				"addon_id" => 284,
				"status" => 1,
				"created_at" => "2023-10-12 12:41:17",
				"updated_at" => "2023-10-12 12:41:17",
			),
			array(
				"id" => 148,
				"item_id" => 291,
				"addon_id" => 285,
				"status" => 1,
				"created_at" => "2023-10-12 12:41:17",
				"updated_at" => "2023-10-12 12:41:17",
			),
			array(
				"id" => 149,
				"item_id" => 290,
				"addon_id" => 284,
				"status" => 1,
				"created_at" => "2023-10-12 12:41:21",
				"updated_at" => "2023-10-12 12:41:21",
			),
			array(
				"id" => 150,
				"item_id" => 290,
				"addon_id" => 286,
				"status" => 1,
				"created_at" => "2023-10-12 12:41:21",
				"updated_at" => "2023-10-12 12:41:21",
			),
		);

		ItemAddon::insert($itemAddons);
	}
}