<?php

namespace TTSoft\Base\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use TTSoft\Base\Helpers\LogActivity;
use Request;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $guard = '')
    {
        // if (config('app.debug') == true) {
        //     LogActivity::addToLog();
        // }
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('auth.login.get.index');
        }
        return $next($request);
    }
}
