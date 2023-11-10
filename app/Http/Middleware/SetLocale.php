<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $language = $request->session()->exists('lang');
        if ($language) {
           $lang =  $request->session()->get('lang');
            app()->setLocale($lang);
        }
        return $next($request);
    }
}
