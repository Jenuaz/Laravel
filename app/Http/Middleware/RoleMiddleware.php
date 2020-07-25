<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{

    public function handle($request, Closure $next, $role, $permission = null)
    {  
        // if (\Auth::check()){
        //     return redirect('/login');
        // }
        // if(!$request->user()->hasRole($role)) {
        //     abort(404);
        // }
        // if($permission !== null && !$request->user()->can($permission)) {
        //     abort(404);
        // }
        if(\Auth::check() && $request->user()->hasRole($role) != null){
            if (!$request->user()->hasRole($role)) {
                abort(404);
            }
            else
                return $next($request);
        }

        return redirect('/login');
        // return $next($request);
     }
}