<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperatorPaymentMaster extends Model
{
	use HasFactory;
	// use SoftDeletes;

	protected $table = 'operator_payment_master';

	protected $fillable = [
		'operator_id',
		'amount',
	];
}
