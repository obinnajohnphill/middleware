<?php
/**
 * Created by PhpStorm.
 * User: obinnajohnphill
 * Date: 26/04/18
 * Time: 12:44
 */

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        } else {
            if (! Auth::user()->isActive()) {
                Auth::logout();
                return redirect()->guest('login');
            }
        }

        return $next($request);
    }
}