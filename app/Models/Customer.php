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
		'city_id',
		'name',
		'phone_number',
		'email',
		'password',
		'is_approved',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];
}
