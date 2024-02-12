<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealDetail extends Model
{
	use HasFactory;

	protected $table = 'deals_details';

	protected $fillable = [
		'deal_id',
		'item_type_id',
		'item_type_name',
		'quantity'
	];

	public function dealMaster()
	{
		return $this->belongsTo('App\Models\DealMaster', 'deal_id');
	}

	public function item()
	{
		return $this->belongsTo('App\Models\Category', 'item_type_id');
	}

	public function dealOptions()
	{
		return $this->hasMany('App\Models\DealOption', 'deal_detail_id');
	}
}
