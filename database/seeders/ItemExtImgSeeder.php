<?php

namespace Database\Seeders;

use App\Models\Items_ext_imgs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemExtImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Items_ext_imgs::truncate();

        $itemExtraImages = array(
            array(
                "id" => 27,
                "item_id" => 46,
                "img" => "/images/branch-products/1/643d233f24b9f.png",
                "created_at" => "2023-04-17 10:45:19",
                "updated_at" => "2023-04-17 10:45:19",
            ),
            array(
                "id" => 28,
                "item_id" => 46,
                "img" => "/images/branch-products/1/643d233f253d7.png",
                "created_at" => "2023-04-17 10:45:19",
                "updated_at" => "2023-04-17 10:45:19",
            ),
            array(
                "id" => 29,
                "item_id" => 48,
                "img" => "/images/branch-products/1/643d4e3e132d3.png",
                "created_at" => "2023-04-17 13:48:46",
                "updated_at" => "2023-04-17 13:48:46",
            ),
            array(
                "id" => 30,
                "item_id" => 48,
                "img" => "/images/branch-products/1/643d4e3e13f88.png",
                "created_at" => "2023-04-17 13:48:46",
                "updated_at" => "2023-04-17 13:48:46",
            ),
            array(
                "id" => 31,
                "item_id" => 49,
                "img" => "/images/branch-products/1/643d4e6c14518.png",
                "created_at" => "2023-04-17 13:49:32",
                "updated_at" => "2023-04-17 13:49:32",
            ),
            array(
                "id" => 32,
                "item_id" => 49,
                "img" => "/images/branch-products/1/643d4e6c15084.png",
                "created_at" => "2023-04-17 13:49:32",
                "updated_at" => "2023-04-17 13:49:32",
            ),
            array(
                "id" => 33,
                "item_id" => 50,
                "img" => "/images/branch-products/1/643d4f22164ce.png",
                "created_at" => "2023-04-17 13:52:34",
                "updated_at" => "2023-04-17 13:52:34",
            ),
            array(
                "id" => 34,
                "item_id" => 50,
                "img" => "/images/branch-products/1/643d4f22170ee.png",
                "created_at" => "2023-04-17 13:52:34",
                "updated_at" => "2023-04-17 13:52:34",
            ),
            array(
                "id" => 35,
                "item_id" => 51,
                "img" => "/images/branch-products/1/643d4f45274d0.png",
                "created_at" => "2023-04-17 13:53:09",
                "updated_at" => "2023-04-17 13:53:09",
            ),
            array(
                "id" => 36,
                "item_id" => 51,
                "img" => "/images/branch-products/1/643d4f4528330.png",
                "created_at" => "2023-04-17 13:53:09",
                "updated_at" => "2023-04-17 13:53:09",
            ),
        );

        Items_ext_imgs::insert($itemExtraImages);
    }
}
