<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
	use HasFactory;
	use SoftDeletes;

	protected $fillable = [
		'name',
		'slug',
		'company_name',
		'shop_number',
		'full_address',
		'logo',
		'banner1',
		'banner2',
		'banner3',
		'current_balance',
		'points_in_hand',
		'date_joining',
		'contact_number_primary',
		'contact_number_sec',
		'commission_percentage',
		'delivery_free_after',
		'delivery_charges',
		'minimum_delivery_amount',
		'email',
		'facebook',
		'website',
		'instagram',
		'twitter_account',
	];

	protected function getDateJoiningAttribute($value)
	{
		return Carbon::parse($value);
	}

	public function deals()
	{
		return $this->hasMany('App\Models\DealMaster');
	}

	public function categories()
	{
		return $this->hasManyThrough(Category::class, Items_list::class, 'vendor_id', 'id', 'id', 'category_id')->distinct();
	}

	public function items()
	{
		return $this->hasMany('App\Models\Items_list');
	}

	public function orders()
	{
		return $this->hasMany('App\Models\OrderMaster');
	}

	public function logins()
	{
		return $this->hasMany('App\Models\Admin');
	}

	public function vendorType()
	{
		return $this->belongsTo('App\Models\VendorType');
	}

	public function operator()
	{
		return $this->belongsTo('App\Models\OperatorMaster', 'operator_id');
	}
}
