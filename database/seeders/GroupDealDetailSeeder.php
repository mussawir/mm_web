<?php

namespace Database\Seeders;

use App\Models\GroupDealDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupDealDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupDealDetail::truncate();
    }
}
