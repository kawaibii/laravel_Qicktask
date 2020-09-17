<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = Session::get('lang', config('app.locate'));
        App::setLocale($language);

        return $next($request);
    }

}

