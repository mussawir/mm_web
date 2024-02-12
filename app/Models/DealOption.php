<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealOption extends Model
{
	use HasFactory;

	protected $table = 'deal_options';

	protected $fillable = [
		'deal_id',
		'deal_detail_id',
		'item_id',
		'item_name',
		'item_description',
		'item_image',
		'item_original_price',
		'deal_price',
		'created_at',
		'updated_at'
	];

    public function dealDetail()
    {
        return $this->belongsTo('App\Models\DealDetail', 'deal_detail_id');
    }

    public function item()
    {
        return $this->belongsTo('App\Models\Items_list', 'item_id');
    }
}
