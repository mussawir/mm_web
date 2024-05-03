<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'customers';
	
	protected $fillable = [
		'name',
		'geo_location',
		'city_id',
		'phone_number',
		'house_number',
		'street',
		'address',
		'email',
		'pin'
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function favouriteVendors()
	{
		return $this->belongsToMany(Vendor::class, 'favourite_vendors', 'customer_id', 'vendor_id');
	}
}
