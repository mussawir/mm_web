<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartAddon extends Model
{
	use HasFactory;

	protected $table = 'cart_addons';
	
	protected $fillable = [
		'cart_master_id',
		'cart_detail_id',
		'item_id',
		'addon_id',
		'quantity',
		'created_at',
		'updated_at',
		'is_deal',
	];
}
