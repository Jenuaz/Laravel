<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{

    public function handle($request, Closure $next, $role, $permission = null)
    {  
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if ($request->user()->hasRole($role) != null) {
            return $next($request);
        }
        // if (\Auth::check()){
        //     return redirect('/login');
        // }
        // if(!$request->user()->hasRole($role)) {
        //     abort(404);
        // }
        // if($permission !== null && !$request->user()->can($permission)) {
        //     abort(404);
        // }
        // if(\Auth::check() && $request->user()->hasRole($role) != null){
        //     if (!$request->user()->hasRole($role)) {
        //         return redirect('/login');
        //     }
        //     else
        //         return $next($request);
        // }
        abort(404);
        // return redirect('/');
        // return $next($request);
     }
}