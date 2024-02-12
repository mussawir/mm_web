<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DealMaster extends Model
{
	use HasFactory;

	protected $table = 'deals_master';

	protected $fillable = [
		'name',
		'description',
		'branch_id',
		'vendor_id',
		'start_date',
		'end_date',
		'banner',
		'grand_total',
		'offer',
		'status',
	];

	protected function getStartDateAttribute($value)
	{
		return Carbon::parse($value);
	}

	protected function getEndDateAttribute($value)
	{
		return Carbon::parse($value);
	}

	public function items()
	{
		return $this->hasMany('App\Models\DealDetail', 'deal_id');
	}

	public function branch()
	{
		return $this->belongsTo('App\Models\Branches');
	}

	public function vendor()
	{
		return $this->belongsTo('App\Models\Vendor');
	}

    public function addons()
    {
        return $this->hasMany('App\Models\DealAddOn', 'deal_id')->with('item');
    }
}
