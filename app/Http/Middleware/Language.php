<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle( Request $request, Closure $next )
    {
        if ( !Session::has('locale') ) Session::put('locale', Config::get('app.locale'));

        App::setLocale(session('locale') ?? 'ru');

        return $next($request);
    }
}
