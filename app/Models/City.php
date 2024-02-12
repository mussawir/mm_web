<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	use HasFactory;

	protected $table = 'cities';

	protected $fillable = [
		'name'
	];

	public function branches()
	{
		return $this->hasMany('App\Models\Branches');
	}

	public function vendors()
	{
		return $this->hasMany('App\Models\Vendor');
	}
}
