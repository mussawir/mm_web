<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  ...$guards
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next, $guards = null)
	{
		$guards = is_array($guards) ? $guards : [$guards];

		foreach ($guards as $guard) {
			if ($guard == 'admin' && Auth::guard($guard)->check()) {
				return redirect('/admin/dashboard');
			}
	
			if ($guard == 'customer' && Auth::guard($guard)->check()) {
				return redirect('/home');
			}
	
			if (is_null($guard) && Auth::guard()->check()) {
				return redirect('/home');
			}
		}

		return $next($request);
	}
}
