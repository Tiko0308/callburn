<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class AdminCall
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
       if(Auth::check() && Auth::user()->role == 'admin'){
           if (Auth::guard($guard)->guest()) {
               if ($request->ajax() || $request->wantsJson()) {
                   return response('Unauthorized.', 401);
               } else {
                   return redirect()->action('AdminsController@getIndex');
               }
           }
       }else{
           return redirect()->action('AdminsController@getIndex');
       }
       return $next($request);
    }
}
