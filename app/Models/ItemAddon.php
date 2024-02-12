<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAddon extends Model
{
	use HasFactory;

	protected $table = 'item_addons';
	
	protected $fillable = [
		'item_id',
		'addon_id',
		'status',
	];
}
