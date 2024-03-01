<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperatorDues extends Model
{
	use HasFactory;
	// use SoftDeletes;

	protected $table = 'operator_dues';

	protected $fillable = [
		'order_id',
		'vendor_id',
		'operator_id',
		'amount'
	];
}
