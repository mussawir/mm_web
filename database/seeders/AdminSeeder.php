<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		// Clear the existing data in the admins table
		Admin::truncate();

		// Insert new admin records
		$admins = [
			[
				'first_name' => 'Admin',
				'last_name' => 'Main',
				'phone_number' => '0111111111',
				'email' => 'admin@example.com',
				'password' => bcrypt('12345678'),
				'role' => null,
				'branch_id' => null,
			],
			[
				'first_name' => 'Gilbert',
				'last_name' => 'Mapple',
				'phone_number' => '03303131319',
				'email' => 'nyfadmin@example.com',
				'password' => bcrypt('12345678'),
				'role' => 1,
				'branch_id' => 1,
			],
			[
				'first_name' => 'Joseph',
				'last_name' => 'Sutton',
				'phone_number' => '03083500781',
				'email' => 'nyfmanager@example.com',
				'password' => bcrypt('12345678'),
				'role' => 2,
				'branch_id' => 1,
			],
			[
				'first_name' => 'Sam',
				'last_name' => 'Rockwell',
				'phone_number' => '03310215272',
				'email' => 'yfadmin@example.com',
				'password' => bcrypt('12345678'),
				'role' => 1,
				'branch_id' => 2,
			],
			[
				'first_name' => 'Sam',
				'last_name' => 'Goodman',
				'phone_number' => '03310215227',
				'email' => 'yfmanager@example.com',
				'password' => bcrypt('12345678'),
				'role' => 2,
				'branch_id' => 2,
			],
		];

		// Insert the data into the admins table
		Admin::insert($admins);
	}
}
