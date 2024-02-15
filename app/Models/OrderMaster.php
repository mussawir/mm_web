<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMaster extends Model
{
	use HasFactory;
	protected $table = 'order_master';

	protected $fillable = [
		'id',
		'customer_id',
		'branch_id',
		'vendor_id',
		'order_address',
		'order_geo_location',
		'item_quantity',
		'grand_total',
		'status',
		'order_type',
		'rider_id',
		'operator_commission',
		'created_at',
		'updated_at',
		'cancelation_reason',
		'payment_type'
	];
	
	public function customer()
	{
		return $this->belongsTo('App\Models\Customer');
	}
	
	public function branch()
	{
		return $this->belongsTo('App\Models\Branches');
	}

	public function details()
	{
		return $this->hasMany('App\Models\OrderDetails', 'order_master_id');
	}

	public function vendor()
	{
		return $this->belongsTo('App\Models\Vendor');
	}
}
