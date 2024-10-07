<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryMap extends Model
{
	use HasFactory;
	
	protected $table = 'inventory_maps';

	protected $fillable = [
		'quantity',
	];
}
