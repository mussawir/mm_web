<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustRegOtp extends Model
{
	use HasFactory;
	protected $table = 'cust_reg_otp';

	protected $fillable = [
		'customer_id',
		'phone_number',
		'otp_number',
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
}
