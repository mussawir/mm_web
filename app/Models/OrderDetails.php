<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
	use HasFactory;

	protected $table = 'order_details';

	protected $fillable = [
		'order_master_id',
		'sub_total',
		'qty',
		'item_id',
		'item_name',
		'main_image',
		'item_price',
		'created_at',
		'updated_at',
		'is_deal',
	];

	public function orderMaster()
	{
		return $this->belongsTo('App\Models\OrderMaster');
	}

	public function orderDealOptions()
	{
		return $this->hasMany('App\Models\OrderDealOption', 'order_detail_id');
	}

	public function orderAddons()
	{
		return $this->hasMany('App\Models\OrderAddon', 'order_detail_id');
	}
}
