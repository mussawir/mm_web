<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Items_list extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'items_lists';

	protected $fillable = [
		'category_id',
		'branch_id',
		'vendor_id',
		'name',
		'discription',
		'discount',
		'instock',
		'price',
		'qty',
		'measuring_unit',
		'qty_reorder',
		'max_order_qty',
		'sort_by',
		'main_image',
		'is_addon',
		'is_grocery',
		'preparation_time',
	];
	
	public function category()
	{
		return $this->belongsTo('App\Models\Category');
	}
	
	public function branch()
	{
		return $this->belongsTo('App\Models\Branches');
	}

	public function vendor ()
	{
		return $this->belongsTo('App\Models\Vendor');
	}

	public function addons()
	{
		return $this->belongsToMany(Items_list::class, 'item_addons', 'item_id', 'addon_id');
	}
}
