<?php

namespace Database\Seeders;

use App\Models\DealMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DealMasterSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		DealMaster::truncate();

		$deals = array(
			array(
				"id" => 70,
				"name" => "Winter Combo Deal",
				"description" => "2 small pizzas with one coffee",
				"branch_id" => 1,
				"start_date" => "2023-11-01 00:00:00",
				"end_date" => "2023-12-31 00:00:00",
				"banner" => "/images/deal-banners/1/1697108968.jpg",
				"grand_total" => 45.00,
				"offer" => 0.00,
				"status" => 1,
				"created_at" => "2023-08-07 09:25:40",
				"updated_at" => "2023-10-12 11:09:43",
			),
			array(
				"id" => 74,
				"name" => "Winter Deal",
				"description" => "2 large pizzas are added in this delicious deal for you.",
				"branch_id" => 1,
				"start_date" => "2023-12-01 00:00:00",
				"end_date" => "2024-02-29 00:00:00",
				"banner" => "/images/deal-banners/1/1697109061.jpg",
				"grand_total" => 40.00,
				"offer" => 0.00,
				"status" => 1,
				"created_at" => "2023-08-07 13:29:11",
				"updated_at" => "2023-10-12 11:11:30",
			),
			array(
				"id" => 78,
				"name" => "Crazy Deal",
				"description" => "2 medium size pizzas with one litre drink.",
				"branch_id" => 1,
				"start_date" => "2023-08-14 00:00:00",
				"end_date" => "2023-08-18 00:00:00",
				"banner" => "/images/deal-banners/1/1697107609.jpg",
				"grand_total" => 40.00,
				"offer" => 0.00,
				"status" => 1,
				"created_at" => "2023-08-15 07:49:14",
				"updated_at" => "2023-10-12 10:47:35",
			),
			array(
				"id" => 84,
				"name" => "Pizza's Deal",
				"description" => "2 regular pizza and 1 pan pizza",
				"branch_id" => 2,
				"start_date" => "2023-01-10 00:00:00",
				"end_date" => "2024-01-01 00:00:00",
				"banner" => "/images/deal-banners/2/1697105621.jpg",
				"grand_total" => 20.00,
				"offer" => 0.00,
				"status" => 1,
				"created_at" => "2023-09-06 00:06:20",
				"updated_at" => "2023-10-12 10:14:52",
			),
			array(
				"id" => 85,
				"name" => "Burger's Combo",
				"description" => "Indulge in the ultimate burger experience with our mouthwatering combo deal. Savor a delicious, juicy burger paired with crispy golden fries and a refreshing beverage, all for an unbeatable price.",
				"branch_id" => 2,
				"start_date" => "2023-01-01 00:00:00",
				"end_date" => "2023-01-02 00:00:00",
				"banner" => "/images/deal-banners/2/1693919605.jpg",
				"grand_total" => 8.00,
				"offer" => 2.00,
				"status" => 1,
				"created_at" => "2023-09-06 01:20:06",
				"updated_at" => "2023-09-06 01:20:06",
			),
			array(
				"id" => 86,
				"name" => "Pizza Lunch Deal",
				"description" => "Enjoy a 4 person delicious slices of pizza with your choice of toppings and a refreshing drink for an unbeatable lunch deal that satisfies your cravings without breaking the bank. It's the perfect midday treat for pizza lovers looking for a quick and tasty meal on a budget.",
				"branch_id" => 2,
				"start_date" => "2023-01-01 00:00:00",
				"end_date" => "2024-01-01 00:00:00",
				"banner" => "/images/deal-banners/2/1697106586.jpg",
				"grand_total" => 15.00,
				"offer" => 0.00,
				"status" => 1,
				"created_at" => "2023-09-06 01:36:25",
				"updated_at" => "2023-10-12 10:30:43",
			),
			array(
				"id" => 87,
				"name" => "Burgers Deal",
				"description" => "2 zinger burgers, 1 mighty burger, 1 kentucky burger",
				"branch_id" => 2,
				"start_date" => "2023-01-01 00:00:00",
				"end_date" => "2024-01-01 00:00:00",
				"banner" => "/images/deal-banners/2/1693980719.jpg",
				"grand_total" => 9.00,
				"offer" => 2.00,
				"status" => 1,
				"created_at" => "2023-09-06 18:13:41",
				"updated_at" => "2023-09-06 18:13:41",
			),
			array(
				"id" => 89,
				"name" => "Family Pizza Deal",
				"description" => "Share the pizza love with our four-person special! Dive into our mouthwatering pizzas, loaded with your favorite toppings, for a satisfying family meal",
				"branch_id" => 2,
				"start_date" => "2023-01-01 00:00:00",
				"end_date" => "2024-01-01 00:00:00",
				"banner" => "/images/deal-banners/2/1693984591.jpg",
				"grand_total" => 10.00,
				"offer" => 3.00,
				"status" => 1,
				"created_at" => "2023-09-06 19:17:29",
				"updated_at" => "2023-09-06 19:17:29",
			),
			array(
				"id" => 90,
				"name" => "Couple Evening Coffee Deal",
				"description" => "Fuel your love with our delightful couple's coffee deal. Enjoy cozy moments together with rich, aromatic brews at a special price.",
				"branch_id" => 2,
				"start_date" => "2023-01-01 00:00:00",
				"end_date" => "2024-01-01 00:00:00",
				"banner" => "/images/deal-banners/2/1697106009.jpg",
				"grand_total" => 30.00,
				"offer" => 0.00,
				"status" => 1,
				"created_at" => "2023-09-06 19:24:10",
				"updated_at" => "2023-10-12 10:21:13",
			),
			array(
				"id" => 91,
				"name" => "Sandwich's Deal for 4",
				"description" => "Savor a trio of delicious sandwiches with our special deal for Four! Perfect for sharing, each bite is packed with flavor and satisfaction.",
				"branch_id" => 2,
				"start_date" => "2023-01-01 00:00:00",
				"end_date" => "2024-01-01 00:00:00",
				"banner" => "/images/deal-banners/2/1697106907.jpg",
				"grand_total" => 12.00,
				"offer" => 0.00,
				"status" => 1,
				"created_at" => "2023-09-06 19:45:28",
				"updated_at" => "2023-10-12 10:35:31",
			),
			array(
				"id" => 92,
				"name" => "Burger's And Pizza",
				"description" => "Get the best of both worlds with our Burger and Pizza combo deal! Indulge in juicy burgers and cheesy pizzas for a mouthwatering meal.",
				"branch_id" => 2,
				"start_date" => "2023-01-01 00:00:00",
				"end_date" => "2024-01-01 00:00:00",
				"banner" => "/images/deal-banners/2/1693986547.jpg",
				"grand_total" => 9.00,
				"offer" => 2.00,
				"status" => 1,
				"created_at" => "2023-09-06 19:50:00",
				"updated_at" => "2023-09-06 19:50:00",
			),
			array(
				"id" => 93,
				"name" => "Dinner Deal for Couple",
				"description" => "Experience a romantic dinner for two with our Couple's Dinner Deal! Indulge in a curated menu designed for a memorable evening together.",
				"branch_id" => 2,
				"start_date" => "2023-01-01 00:00:00",
				"end_date" => "2024-01-01 00:00:00",
				"banner" => "/images/deal-banners/2/1695900925.jpg",
				"grand_total" => 14.00,
				"offer" => 10.00,
				"status" => 1,
				"created_at" => "2023-09-07 01:26:20",
				"updated_at" => "2023-09-28 11:37:06",
			),
		);

		// Insert the data into the 'deals_master' table
		DealMaster::insert($deals);

		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}
}