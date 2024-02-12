<?php

namespace App\Imports;

use App\Models\Items_list;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ItemsListImport implements ToModel ,WithHeadingRow
{
    public function  __construct($shop_id)
    {
        $this->shop_id= $shop_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    *
    */
    public function model(array $row)
    {
        return new Items_list([
            'shop_id'  => $this->shop_id,
            'name'  => $row['name'],
            'discount'  => $row['discount'],
            'instock' => $row['instock'],
            'price' => $row['price'],
            'main_image' => $row['main_image'],
        ]);
    }
}
