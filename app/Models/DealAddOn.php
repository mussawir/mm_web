<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealAddOn extends Model
{
	use HasFactory;

	protected $table = 'deal_addons';

	protected $fillable = [
		'deal_id',
		'item_id',
		'quantity',
		'status',
	];

	public function deal()
	{
		return $this->belongsTo('App\Models\DealMaster', 'deal_id');
	}

	public function item()
	{
		return $this->belongsTo('App\Models\Items_list', 'item_id');
	}
}
