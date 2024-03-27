<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
	use HasFactory;
	protected $table = 'cart_details';
	
	protected $fillable = [
		'cart_master_id',
		'unique_key',
		'sub_total',
		'qty',
		'measuring_unit',
		'item_id',
		'item_name',
		'main_image',
		'item_price',
		'is_deal',
	];

	public function cartMaster()
	{
		return $this->belongsTo('App\Models\CartMaster');
	}
	
	public function cartDealOptions()
	{
		return $this->hasMany('App\Models\CartDealOption', 'cart_detail_id');
	}
}
