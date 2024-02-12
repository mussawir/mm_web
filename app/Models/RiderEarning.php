<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderEarning extends Model
{
	use HasFactory;

	protected $table = 'rider_earnings';

	protected $fillable = [
		'rider_id',
		'delivery_id',
		'commission_rate_id',
		'earnings_amount',
	];
}
