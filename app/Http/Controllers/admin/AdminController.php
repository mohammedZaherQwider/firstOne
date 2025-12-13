<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function dashboard()
    {
        if (Auth::check() && Auth::user()->type == "admin") {
            return view('back_end.index');
            // return view('dashboard');
        }
        if (Auth::user()->type == "user") {
            return redirect()->route('/');
        }
    }
}
