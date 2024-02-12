<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsPrivileged
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next): Response
	{
		if (is_null(auth()->user()->branch))
		{
			return $next($request);
		}
		if (auth()->user()->branch->id != $request->id)
		{
			abort(401);
		}

		return $next($request);
	}
}
