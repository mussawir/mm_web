<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartMaster extends Model
{
	use HasFactory;
	protected $table = 'cart_master';
	
	protected $fillable = [
		'customer_id',
		'ip_address',
		'branch_id',
		'vendor_id',
		'item_quantity',
		'grand_total',
		'status',
	];

	public function cartItems()
	{
		return $this->hasMany('App\Models\CartDetail', 'cart_master_id');
	}

	public function cartDealOptions()
	{
		return $this->hasMany('App\Models\CartDealOption', 'cart_master_id');
	}

	public function vendors()
	{
		return $this->belongsTo('App\Models\Vendor');
	}

	public function cartAddons()
	{
		return $this->hasMany('App\Models\CartAddon', 'cart_master_id');
	}
}
