<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
	use HasFactory;
	
	protected $table = 'delivery';

	protected $fillable = [
		'order_master_id',
		'customer_id',
		'rider_id',
		'pick_up_time',
		'delivered_time',
		'customer_comments',
		'comments',
		'rating',
		'base_return_time',
		'commission_amount',
		'status',
	];
}
