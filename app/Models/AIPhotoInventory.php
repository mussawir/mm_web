<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIPhotoInventory extends Model
{
	use HasFactory;

	protected $table = 'ai_photo_inventory';

	protected $fillable = [
		'customer_id',
		'category_id',
		'item_id',
		'item_label',
		'item_image',
		'current_stock',
	];

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
}
