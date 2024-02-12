<?php

namespace App\Providers;

use App\Models\Currency;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		Paginator::useBootstrapFive();
		// Retrieve currency information from the database
		$currency = Currency::where('status', 1)->first();

		if ($currency->count())
		{
			// Store currency information in the session
			Session::put('currency', $currency);
		}
		else
		{
			session(['currency' => ['symbol' => '$']]);
		}
	}
}
