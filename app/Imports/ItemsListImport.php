<?php

namespace App\Imports;

use App\Models\Item;
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
        return new Item([
            'shop_id'  => $this->shop_id,
            'name'  => $row['name'],
            'discount'  => $row['discount'],
            'instock' => $row['instock'],
            'price' => $row['price'],
            'image' => $row['image'],
        ]);
    }
}
