<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemExtImage extends Model
{
	use HasFactory;

	protected $table = 'item_ext_img';

	protected $fillable = [
		'item_id',
		'addon_id',
		'status',
	];
}
