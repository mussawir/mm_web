<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
	use HasFactory;
	protected $table = 'branches';

	protected $fillable = [
		'name',
		'phone',
		'city_id',
		'banner',
		'description',
		'deleted',
	];

	public function deal()
	{
		return $this->hasMany('App\Models\DealMaster');
	}

	public function reservations()
	{
		return $this->hasMany('App\Models\Reservation');
	}

	public function items()
	{
		return $this->hasMany('App\Models\Items_list', 'branch_id');
	}

	public function city()
	{
		return $this->belongsTo('App\Models\City', 'city_id');
	}

	public function vendors()
	{
		return $this->hasMany('App\Models\Vendor', 'branch_id');
	}
}
