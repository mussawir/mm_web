<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperatorPaymentDetails extends Model
{
	use HasFactory;
	// use SoftDeletes;

	protected $table = 'operator_payment_details';

	protected $fillable = [
		'payment_id',
		'payment_method',
		'invoice_id',
	];
}
