<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDealOption extends Model
{
	use HasFactory;

	protected $table = 'cart_deal_options';
	
	protected $fillable = [
		'deal_id',
		'cart_master_id',
		'cart_detail_id',
		'item_id',
		'item_name',
		'item_description',
		'item_image',
		'item_original_price',
		'deal_price',
		'quantity',
	];

	public function cartDetail()
	{
		return $this->belongsTo('App\Models\CartDetail', 'cart_detail_id');
	}
}
