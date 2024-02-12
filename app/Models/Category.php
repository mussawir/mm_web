<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $table = 'item_categories';

	protected $fillable = [
		'parent_id',
		'vendor_type_id',
		'sort_by',
		'is_mu',
		'name',
		'image',
		'created_at',
		'updated_at',
	];

	public function items()
	{
		return $this->hasMany('App\Models\Items_list', 'category_id');
	}

	public function addons()
	{
		return $this->hasMany('App\Models\Items_list')->where('is_addon', 1);
	}

	public function parentCategory()
	{
		return $this->belongsTo(Category::class, 'parent_id');
	}

	public function vendorType()
	{
		return $this->belongsTo('App\Models\VendorType');
	}
}
