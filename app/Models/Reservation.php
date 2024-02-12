<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
	use HasFactory;

	protected $table = 'reservations';

	protected $fillable = [
		'branch_id',
		'reservation_id',
		'name',
		'phone',
		'reservation_date',
		'reservation_time',
		'no_of_guests',
		'instructions',
		'status',
	];

	public function branch()
	{
		return $this->belongsTo('App\Models\Branches');
	}
}
