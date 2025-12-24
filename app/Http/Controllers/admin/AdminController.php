<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use App\Notifications\NewNotification;
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
            // return redirect()->route('/');
        }
    }
    function notification()
    {
        $users = User::all();
        return view('back_end.Notifications.index', compact('users'));
    }
    function send_notification(Request $request)
    {

        $user = User::find($request->user_id);
        $msg = "Notification from " . auth()->user()->name . ":\n" . $request->notification;
        // dd($msg);
        $user->notify(new NewNotification($msg));
        return redirect()->back()->with('msg', 'Notification Sended');
    }
    function read($id)
    {
        Auth::user()->notifications->find($id)->markAsRead();
        return redirect()->back();
    }
    function settings_viwe()
    {
        return view('back_end.settings.index');
    }
    function settings(Request $request)
    {

        foreach ($request->except('_token') as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        cache()->forget('settings');
        return back()->with('success', 'Settings seved');
    }
}
