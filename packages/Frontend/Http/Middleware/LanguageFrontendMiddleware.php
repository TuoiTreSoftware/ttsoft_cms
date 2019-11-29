<?php

namespace TTSoft\Frontend\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
class LanguageFrontendMiddleware{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('lang_locale_frontend')) {
            App::setLocale(session()->get('lang_locale_frontend'));
        }
        return $next($request);
    }
}
