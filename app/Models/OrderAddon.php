<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddon extends Model
{
	use HasFactory;

	protected $table = 'order_addons';
	
	protected $fillable = [
		'order_master_id',
		'order_detail_id',
		'item_id',
		'addon_id',
		'quantity',
		'created_at',
		'updated_at',
		'is_deal',
	];

	public function addonItem()
	{
		return $this->belongsTo('App\Models\Items_list', 'addon_id');
	}
}
