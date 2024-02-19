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
	// public function handle(Request $request, Closure $next, ...$guards)
	// {
	//     $guards = empty($guards) ? [null] : $guards;

	//     foreach ($guards as $guard) {
	//         if (Auth::guard($guard)->check()) {
	//             return redirect(RouteServiceProvider::HOME);
	//         }
	//     }

	//     return $next($request);
	// }

	public function handle(Request $request, Closure $next, $guards = null)
	{
		if ($guards == "admin" && Auth::guard($guards)->check()) {
			return redirect('/admin/dashboard');
		}
		if ($guards == "rider" && Auth::guard($guards)->check()) {
			return redirect('/rider/dashboard');
		}
		if ($guards == "customer" && Auth::guard($guards)->check()) {
			return redirect('/home');
		}

		return $next($request);
	}
}
