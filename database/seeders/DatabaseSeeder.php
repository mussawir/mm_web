<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		$this->call([
			AdminSeeder::class,
			BranchSeeder::class,
			BranchesCustomersSeeder::class,
			BranchServiceLocationsSeeder::class,
			CartMasterSeeder::class,
			CartDetailSeeder::class,
			CartDealOptionSeeder::class,
			CartAddonSeeder::class,
			CitiesSeeder::class,
			CurrenciesSeeder::class,
			CustomersSeeder::class,
			CustRegOtpSeeder::class,
			DealMasterSeeder::class,
			DealDetailSeeder::class,
			DealOptionSeeder::class,
			DealAddonSeeder::class,
			GroupDealMasterSeeder::class,
			GroupDealDetailSeeder::class,
			GroupItemSeeder::class,
			ItemListSeeder::class,
			ItemAddonSeeder::class,
			ItemCategorySeeder::class,
			ItemExtImgSeeder::class,
			OrderMasterSeeder::class,
			OrderDetailSeeder::class,
			OrderDealOptionSeeder::class,
			OrderAddonSeeder::class,
			ReservationSeeder::class,
			ServiceLocationSeeder::class,
		]);
	}
}
