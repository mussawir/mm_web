<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDealOption extends Model
{
	use HasFactory;

	protected $table = 'order_deal_options';
	
	protected $fillable = [
		'deal_id',
		'order_master_id',
		'order_detail_id',
		'item_id',
		'item_name',
		'item_description',
		'item_image',
		'item_original_price',
		'deal_price',
		'quantity',
	];

	public function orderDetail()
	{
		return $this->belongsTo('App\Models\OrderDetail', 'order_detail_id');
	}
}
