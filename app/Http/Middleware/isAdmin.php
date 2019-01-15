<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class isAdmin
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
        if(Auth::check())
            if(Auth::user()->user_type_id==6)
            {
                return $next($request);
            }
            else{
                return abort(401);
            }
        else
            return redirect('login');
    }
}
