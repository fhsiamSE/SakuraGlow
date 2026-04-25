<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(2==2){
            return $next($request);
        }else{
            return redirect()->route('/login')->with('error', 'Invalid credentials. Please try again.');
        }
        
    }
}
