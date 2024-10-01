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
		$action = $request->route()->getAction();
		$middleware = array_filter($action['middleware'], fn($mid) => strpos($mid, 'auth:') !== false);

		if (empty($middleware)) {
			# Handle case when no auth middleware is found
			return route('login');
		}

		$guard = explode(':', reset($middleware))[1];

		if ($guard === 'customer') {
			if (Auth::guard('admin')->check()) {
				session()->flash('success', "Please login as a customer to order, Admin cannot place order.");

				return route('home');
			}

			return route('customer.login');
		} elseif ($guard === 'admin') {
			return route('admin.login');
		}

		return $request->expectsJson() ? null : route('login');
	}
}
