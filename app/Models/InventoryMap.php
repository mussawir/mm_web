<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryMap extends Model
{
	use HasFactory;
	
	protected $table = 'inventory_maps';

	protected $fillable = [
		'item_id',
		'location_id',
		'customer_id',
		'capacity',
		'reorder_quantity',
	];

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function location()
	{
		return $this->belongsTo(Location::class);
	}

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
}
