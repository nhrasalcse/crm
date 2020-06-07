<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use Brian2694\Toastr\Facades\Toastr;
class SuperAdmin
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
         $auth=Auth::user();
        if ($auth->role->id == 1){
            return $next($request);
        }else{
            Toastr::info('Sorry you have no permission','Inof');
            return redirect('/home');
        }
    }
}
