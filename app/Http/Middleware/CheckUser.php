<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{

//    public function handle(Request $request, Closure $next)
//    {
//        if(auth()->user()->status==0){
//        return response(' dactive');
//        }
//        return $next($request);
//    }
}
