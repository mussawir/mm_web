<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::truncate();

        // Define the data to insert
        $currencies = [
            [
                'id' => 1,
                'currency_name' => 'USD',
                'symbol' => '$',
                'country' => 'United States',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data into the currencies table
        Currency::insert($currencies);
    }
}
