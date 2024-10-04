<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'items_lists';

	protected $fillable = [
		'category_id',
		'vendor_id',
		'name',
		'description',
		'discount',
		'instock',
		'price',
		'quantity',
		'qty_reorder',
		'max_order_qty',
		'sort_by',
		'image',
		'sku_code',
	];
	
	public function category()
	{
		return $this->belongsTo('App\Models\Category');
	}

	public function vendor ()
	{
		return $this->belongsTo('App\Models\Vendor');
	}

	public function addons()
	{
		return $this->belongsToMany(Item::class, 'item_addons', 'item_id', 'addon_id');
	}
}
