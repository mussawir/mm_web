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
		'full_address',
		'logo',
		'banner1',
		'banner2',
		'banner3',
		'date_joining',
		'contact_number_primary',
		'contact_number_sec',
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
		return $this->hasManyThrough(Category::class, Item::class, 'vendor_id', 'id', 'id', 'category_id')->distinct();
	}

	public function items()
	{
		return $this->hasMany('App\Models\Item');
	}

	public function orders()
	{
		return $this->hasMany('App\Models\OrderMaster');
	}

	public function customers()
	{
		return $this->belongsToMany(Customer::class, 'favourite_vendors', 'vendor_id', 'customer_id');
	}
}
