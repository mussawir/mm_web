<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorType extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'type_name',
		'is_food',
		'status',
	];

	public function categories()
	{
		return $this->hasMany('App\Models\Category');
	}
	
	public function vendors()
	{
		return $this->hasMany('App\Models\Vendor');
	}
}
