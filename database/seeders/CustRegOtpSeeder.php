<?php

namespace Database\Seeders;

use App\Models\CustRegOtp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustRegOtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustRegOtp::truncate();
    }
}
