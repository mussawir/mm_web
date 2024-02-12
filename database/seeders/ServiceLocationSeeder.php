<?php

namespace Database\Seeders;

use App\Models\ServiceLocations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceLocations::truncate();

        $serviceLocations = array(
            array(
                "id" => 1,
                "name" => "New York Food Street",
                "country" => "USA",
                "state" => "New York",
                "city_id" => 1,
                "neighbourhood" => "2nd Street New York Yankees Coffee",
                "branch_id" => 1,
                "created_at" => "2023-01-27 00:05:00",
                "updated_at" => "2023-09-04 11:50:35",
            ),
            array(
                "id" => 2,
                "name" => "Times Square Manhattan",
                "country" => "USA",
                "state" => "New York",
                "city_id" => 1,
                "neighbourhood" => "Times Square,  Manhattan",
                "branch_id" => 2,
                "created_at" => "2023-02-05 14:11:25",
                "updated_at" => "2023-08-01 09:29:28",
            ),
        );

        ServiceLocations::insert($serviceLocations);
    }
}
