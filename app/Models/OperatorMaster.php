<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorMaster extends Model
{
	use HasFactory;

	protected $table = 'operator_master';

	protected $fillable = [
		'name',
		'email',
		'phone',
		'company_name',
		'logo',
		'banner',
		'single_vendor',
	];

	public function details()
	{
		return $this->hasOne('App\Models\OperatorDetail', 'operator_id');
	}

	public function vendors()
	{
		return $this->hasMany('App\Models\Vendor', 'operator_id');
	}
}
