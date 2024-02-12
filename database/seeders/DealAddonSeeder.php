<?php

namespace Database\Seeders;

use App\Models\DealAddOn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DealAddonSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		DealAddOn::truncate();

		$dealAddons = array(
			array(
				"id" => 14,
				"deal_id" => 12,
				"item_id" => 70,
				"quantity" => 1,
				"status" => 1,
				"created_at" => "2023-07-18 09:46:45",
				"updated_at" => "2023-07-18 09:46:45",
			),
			array(
				"id" => 15,
				"deal_id" => 12,
				"item_id" => 64,
				"quantity" => 2,
				"status" => 1,
				"created_at" => "2023-07-18 09:46:45",
				"updated_at" => "2023-07-18 09:46:45",
			),
			array(
				"id" => 16,
				"deal_id" => 78,
				"item_id" => 65,
				"quantity" => 1,
				"status" => 1,
				"created_at" => "2023-08-25 07:39:08",
				"updated_at" => "2023-08-25 07:39:08",
			),
			array(
				"id" => 17,
				"deal_id" => 78,
				"item_id" => 64,
				"quantity" => 1,
				"status" => 1,
				"created_at" => "2023-08-25 07:39:08",
				"updated_at" => "2023-08-25 07:39:08",
			),
			array(
				"id" => 18,
				"deal_id" => 86,
				"item_id" => 340,
				"quantity" => 1,
				"status" => 1,
				"created_at" => "2023-10-12 10:32:33",
				"updated_at" => "2023-10-12 10:32:33",
			),
			array(
				"id" => 19,
				"deal_id" => 86,
				"item_id" => 336,
				"quantity" => 1,
				"status" => 1,
				"created_at" => "2023-10-12 10:32:33",
				"updated_at" => "2023-10-12 10:32:33",
			),
			array(
				"id" => 20,
				"deal_id" => 86,
				"item_id" => 343,
				"quantity" => 1,
				"status" => 1,
				"created_at" => "2023-10-12 10:32:33",
				"updated_at" => "2023-10-12 10:32:33",
			),
			array(
				"id" => 21,
				"deal_id" => 86,
				"item_id" => 348,
				"quantity" => 1,
				"status" => 1,
				"created_at" => "2023-10-12 10:32:33",
				"updated_at" => "2023-10-12 10:32:33",
			),
			array(
				"id" => 22,
				"deal_id" => 92,
				"item_id" => 347,
				"quantity" => 1,
				"status" => 1,
				"created_at" => "2023-10-12 10:36:05",
				"updated_at" => "2023-10-12 10:36:05",
			),
			array(
				"id" => 23,
				"deal_id" => 92,
				"item_id" => 349,
				"quantity" => 1,
				"status" => 1,
				"created_at" => "2023-10-12 10:36:05",
				"updated_at" => "2023-10-12 10:36:05",
			),
			array(
				"id" => 24,
				"deal_id" => 92,
				"item_id" => 351,
				"quantity" => 2,
				"status" => 1,
				"created_at" => "2023-10-12 10:36:05",
				"updated_at" => "2023-10-12 10:36:05",
			),
			array(
				"id" => 25,
				"deal_id" => 91,
				"item_id" => 319,
				"quantity" => 1,
				"status" => 1,
				"created_at" => "2023-10-12 10:36:20",
				"updated_at" => "2023-10-12 10:36:20",
			),
			array(
				"id" => 26,
				"deal_id" => 91,
				"item_id" => 320,
				"quantity" => 1,
				"status" => 1,
				"created_at" => "2023-10-12 10:36:20",
				"updated_at" => "2023-10-12 10:36:20",
			),
			array(
				"id" => 27,
				"deal_id" => 91,
				"item_id" => 321,
				"quantity" => 1,
				"status" => 1,
				"created_at" => "2023-10-12 10:36:20",
				"updated_at" => "2023-10-12 10:36:20",
			),
		);

		DealAddon::insert($dealAddons);
	}
}
