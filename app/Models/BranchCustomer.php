<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchCustomer extends Model
{
	use HasFactory;
	protected $table = 'branches_customers';

	protected $fillable = [
		'branch_id',
		'customer_id',
		'status',
	];
}
