<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The model to policy mappings for the application.
	 *
	 * @var array<class-string, class-string>
	 */
	protected $policies = [
		//
	];

	/**
	 * Register any authentication / authorization services.
	 */
	public function boot(): void
	{
		$this->registerPolicies();

		// Admin
		Gate::define('admin', function ($user) {
			return $user->role == '0';
		});

		// Single Vendor Operator
		Gate::define('single-vendor-operator', function ($user) {
			return $user->role == '1' && $user->operator->single_vendor == '1';
		});

		// Operator
		Gate::define('operator', function($user) {
			return $user->role == '1';
		});

		// Vendor
		Gate::define('vendor', function($user) {
			return $user->role == '2';
		});
	}
}
