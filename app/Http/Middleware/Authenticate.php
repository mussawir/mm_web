<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
	/**
	 * Get the path the user should be redirected to when they are not authenticated.
	 */
	protected function redirectTo(Request $request): ?string
	{
		if ($request->routeIs('checkout.*'))
		{
			if (Auth::guard('admin')->check()) {
				session()->flash('success', "Please login as a customer to order, Admin cannot place order.");

				return route('home');
			}

			return route('customer.login');
		}

		$path = $request->path();

		if (str_contains($path, 'admin'))
		{
			return route('admin.login');
		}

		return $request->expectsJson() ? null : route('login');
	}
}
