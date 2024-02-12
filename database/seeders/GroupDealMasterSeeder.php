<?php

namespace Database\Seeders;

use App\Models\GroupDealMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupDealMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupDealMaster::truncate();
    }
}
