<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
       
        if(auth()->user()->type == $userType){
            if(auth()->user()->type == 'user'){
                if(auth()->user()->status==0){
                    Auth::logout(); 
                    return redirect()->route('login.code');
                }
            }
            return $next($request);
        }else if(auth()->user()->type == 'admin'){
            return redirect()->route('admin.home');
        }else if(auth()->user()->type == 'user'){
            return redirect()->route('home');
        }else{
            Auth::logout(); 
            return redirect()->route('login');
        }
         
        return response()->json(['You do not have permission to access for this page.']);
    }
}
