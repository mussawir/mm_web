<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NsaLead extends Model
{
	use HasFactory;
	
	protected $table = 'nsa_leads';
	
	protected $fillable = [
		'id',
		'name',
		'phone_number',
		'country',
		'state',
		'city',
		'neighbourhood',
	];
}
