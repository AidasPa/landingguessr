<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->expectsJson()) {
            if (!auth('api')->user()->admin) {
                return response()->json(['status' => 'error'], 401);
            }
            return $next($request);

        } else {
            if (!auth()->user()->admin) {
                return redirect(route('home'));
            }
            return $next($request);
        }
    }
}
