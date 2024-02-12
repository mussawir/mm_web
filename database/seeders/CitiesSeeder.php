<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		City::truncate();

		// Define the data to insert
		$cities = [
			[
				'id' => 1,
				'name' => 'New York',
				'created_at' => '2023-08-01 13:57:52',
				'updated_at' => '2023-08-01 13:57:53',
			],
		];

		// Insert data into the cities table
		City::insert($cities);

		DB::statement('SET FOREIGN_KEY_CHECKS=1');
	}
}
