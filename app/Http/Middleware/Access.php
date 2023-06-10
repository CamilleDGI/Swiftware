<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
    //     if(auth()->access=='admin'){
    //         return $next($request)->with('success','You are logged in as an Admin.');
    //     }else if (auth()->access=='operation'){
    //         return redirect('operation')->with('success','You are logged in as an Operation.');
    //     }else {
    //         return redirect('home')->with('error','You are not yet registered');
    // }
        if (!session()->has('loginId')) {
            return redirect('login')->with('fail', 'You have to log in first.');
        }
        
        return $next($request);
        
    }
}