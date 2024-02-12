<?php

namespace Database\Seeders;

use App\Models\DealDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DealDetailSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		DealDetail::truncate();

		$dealsDetails = array(
			array(
				"id" => 84,
				"deal_id" => 85,
				"item_type_id" => 109,
				"item_type_name" => "Burger's Combo",
				"quantity" => 2,
				"created_at" => "2023-09-06 01:20:06",
				"updated_at" => "2023-09-06 01:20:06",
			),
			array(
				"id" => 87,
				"deal_id" => 87,
				"item_type_id" => 107,
				"item_type_name" => "Burgers lunch Deal ",
				"quantity" => 2,
				"created_at" => "2023-09-06 18:13:41",
				"updated_at" => "2023-09-06 18:13:41",
			),
			array(
				"id" => 90,
				"deal_id" => 89,
				"item_type_id" => 112,
				"item_type_name" => "Family Pizza Deal",
				"quantity" => 2,
				"created_at" => "2023-09-06 19:17:29",
				"updated_at" => "2023-09-06 19:17:29",
			),
			array(
				"id" => 91,
				"deal_id" => 89,
				"item_type_id" => 116,
				"item_type_name" => "Family Pizza Deal",
				"quantity" => 1,
				"created_at" => "2023-09-06 19:17:29",
				"updated_at" => "2023-09-06 19:17:29",
			),
			array(
				"id" => 92,
				"deal_id" => 89,
				"item_type_id" => 114,
				"item_type_name" => "Family Pizza Deal",
				"quantity" => 1,
				"created_at" => "2023-09-06 19:17:29",
				"updated_at" => "2023-09-06 19:17:29",
			),
			array(
				"id" => 94,
				"deal_id" => 92,
				"item_type_id" => 109,
				"item_type_name" => "Burger's And Pizza",
				"quantity" => 1,
				"created_at" => "2023-09-06 19:50:00",
				"updated_at" => "2023-09-06 19:50:00",
			),
			array(
				"id" => 95,
				"deal_id" => 92,
				"item_type_id" => 116,
				"item_type_name" => "Burger's And Pizza",
				"quantity" => 1,
				"created_at" => "2023-09-06 19:50:00",
				"updated_at" => "2023-09-06 19:50:00",
			),
			array(
				"id" => 96,
				"deal_id" => 92,
				"item_type_id" => 106,
				"item_type_name" => "Burger's And Pizza",
				"quantity" => 1,
				"created_at" => "2023-09-06 19:50:00",
				"updated_at" => "2023-09-06 19:50:00",
			),
			array(
				"id" => 107,
				"deal_id" => 93,
				"item_type_id" => 106,
				"item_type_name" => "Dinner Deal for Couple",
				"quantity" => 2,
				"created_at" => "2023-09-28 11:37:06",
				"updated_at" => "2023-09-28 11:37:06",
			),
			array(
				"id" => 108,
				"deal_id" => 84,
				"item_type_id" => 112,
				"item_type_name" => "Regular Pizza",
				"quantity" => 2,
				"created_at" => "2023-10-12 10:14:53",
				"updated_at" => "2023-10-12 10:14:53",
			),
			array(
				"id" => 109,
				"deal_id" => 84,
				"item_type_id" => 116,
				"item_type_name" => "Pan Pizza",
				"quantity" => 1,
				"created_at" => "2023-10-12 10:14:53",
				"updated_at" => "2023-10-12 10:14:53",
			),
			array(
				"id" => 110,
				"deal_id" => 90,
				"item_type_id" => 123,
				"item_type_name" => "Coffee",
				"quantity" => 2,
				"created_at" => "2023-10-12 10:21:13",
				"updated_at" => "2023-10-12 10:21:13",
			),
			array(
				"id" => 111,
				"deal_id" => 90,
				"item_type_id" => 120,
				"item_type_name" => "Sandwich",
				"quantity" => 2,
				"created_at" => "2023-10-12 10:21:13",
				"updated_at" => "2023-10-12 10:21:13",
			),
			array(
				"id" => 112,
				"deal_id" => 86,
				"item_type_id" => 112,
				"item_type_name" => "Pizza",
				"quantity" => 1,
				"created_at" => "2023-10-12 10:30:43",
				"updated_at" => "2023-10-12 10:30:43",
			),
			array(
				"id" => 113,
				"deal_id" => 86,
				"item_type_id" => 110,
				"item_type_name" => "Drink",
				"quantity" => 1,
				"created_at" => "2023-10-12 10:30:43",
				"updated_at" => "2023-10-12 10:30:43",
			),
			array(
				"id" => 114,
				"deal_id" => 91,
				"item_type_id" => 120,
				"item_type_name" => "Sandwich's Deal for 4",
				"quantity" => 2,
				"created_at" => "2023-10-12 10:35:31",
				"updated_at" => "2023-10-12 10:35:31",
			),
			array(
				"id" => 115,
				"deal_id" => 78,
				"item_type_id" => 45,
				"item_type_name" => "Medium Pizza",
				"quantity" => 2,
				"created_at" => "2023-10-12 10:47:35",
				"updated_at" => "2023-10-12 10:47:35",
			),
			array(
				"id" => 116,
				"deal_id" => 78,
				"item_type_id" => 93,
				"item_type_name" => "One Cold Drink",
				"quantity" => 1,
				"created_at" => "2023-10-12 10:47:35",
				"updated_at" => "2023-10-12 10:47:35",
			),
			array(
				"id" => 119,
				"deal_id" => 70,
				"item_type_id" => 45,
				"item_type_name" => "2 Small Pizzas",
				"quantity" => 2,
				"created_at" => "2023-10-12 11:09:43",
				"updated_at" => "2023-10-12 11:09:43",
			),
			array(
				"id" => 120,
				"deal_id" => 70,
				"item_type_id" => 94,
				"item_type_name" => "Coffee",
				"quantity" => 1,
				"created_at" => "2023-10-12 11:09:43",
				"updated_at" => "2023-10-12 11:09:43",
			),
			array(
				"id" => 121,
				"deal_id" => 74,
				"item_type_id" => 45,
				"item_type_name" => "Large Pizza",
				"quantity" => 2,
				"created_at" => "2023-10-12 11:11:30",
				"updated_at" => "2023-10-12 11:11:30",
			),
			array(
				"id" => 122,
				"deal_id" => 74,
				"item_type_id" => 93,
				"item_type_name" => "1 litre drink",
				"quantity" => 1,
				"created_at" => "2023-10-12 11:11:30",
				"updated_at" => "2023-10-12 11:11:30",
			),
		);

		DealDetail::insert($dealsDetails);
	}
}