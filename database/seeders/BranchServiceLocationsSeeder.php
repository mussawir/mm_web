<?php

namespace Database\Seeders;

use App\Models\BranchServiceLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchServiceLocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BranchServiceLocation::truncate();

        $branchServiceLocations = [
            [
                'branch_id' => 1,
                'sl_id' => 1,
                'created_at' => '2023-05-02 12:13:21',
                'updated_at' => '2023-05-02 12:20:22',
            ],
            [
                'branch_id' => 2,
                'sl_id' => 1,
                'created_at' => '2023-05-02 12:13:29',
                'updated_at' => '2023-05-02 12:20:17',
            ],
        ];

        // Insert data into the branch_service_locations table
        BranchServiceLocation::insert($branchServiceLocations);
    }
}
