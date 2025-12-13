<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class authType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // if (Auth::check() && Auth::user()->type == "admin") {
        //     return view('back_end.index');
        // }
        // if (Auth::user()->type == "user") {
        //     return redirect()->route('/');
        // }
    }
}
