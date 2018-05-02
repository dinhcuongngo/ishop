<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        $isAdmin = Auth::user()->admin;
        //dd($isAdmin);
        if($isAdmin === 'false')
        {
            return redirect('/home');
        }
        return $next($request);
    }
}
