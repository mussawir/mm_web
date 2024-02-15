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
	];

	public function details()
	{
		return $this->hasOne('App\Models\OperatorDetail', 'operator_id');
	}
}
