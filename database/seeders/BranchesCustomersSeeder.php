<?php

namespace Database\Seeders;

use App\Models\BranchCustomer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchesCustomersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		BranchCustomer::truncate();

		// Insert data into the branches_customers table
		BranchCustomer::insert([
			[
				'id' => 1,
				'branch_id' => 1,
				'customer_id' => 1,
				'status' => 1,
				'created_at' => now(),
				'updated_at' => now(),
			],
		]);
	}
}
