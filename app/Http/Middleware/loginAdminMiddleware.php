<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class loginAdminMiddleware
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
       if (Auth::check()) {
            $user=Auth::user();
            if ($user->user_type == User::ADMIN_TYPE) {
                return $next($request);
            }else{
                return redirect()->route('admin.getLogin')->with('error', 'Incorrect information!!!');
            }
           
       }else{
           return redirect()->route('admin.getLogin');
       }
    }
}
