<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use \App\User;

class Ban
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

        if(auth()->check()) {
            $user = User::find(Auth::user()->id);
            // dd($user->banned_at);
            if( $user->banned_at == NULL) {
                return $next($request);
            }
            if(auth()->check()) {
                auth()->logout();
                return redirect()->route('login')->with('banned', "Your account is blocked!");
            }
            return redirect()->route('login')->with('banned', "Your account is blocked!");
        }
        return $next($request);
        
    }
    
}
