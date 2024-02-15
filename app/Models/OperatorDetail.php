<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorDetail extends Model
{
	use HasFactory;

	protected $table = 'operator_details';

	protected $fillable = [
		'operation_geo_location',
		'address',
		'operation_radius',
		'operational_area',
		'commission_percentage',
		'area_name',
	];

	public function operator()
	{
		return $this->belongsTo('App\Models\OperatorMaster');
	}

	public function city()
	{
		return $this->belongsTo('App\Models\City');
	}
}
