<?php

namespace Database\Seeders;

use App\Models\Branches;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		// Clear the existing data in the branches table
		Branches::truncate();

		$branches = [
			[
				'name' => 'New York Food',
				'phone' => '03073400720',
				'deleted' => 0,
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'name' => "Yummy's Fast Food",
				'phone' => '03310215272',
				'deleted' => 0,
				'created_at' => now(),
				'updated_at' => now(),
			],
		];

		// Insert data into the branches table
		Branches::insert($branches);
	}
}
