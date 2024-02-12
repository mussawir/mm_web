<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperatorCommissionHistory extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'operator_commission_history';

	protected $fillable = [
		'vendor_id',
		'commission percentage',
		'status',
	];
}
