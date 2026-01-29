<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Hospital;
use App\Models\Job;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Can;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('back_end.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::select('id', 'name')->get();
        $countries = Country::select('id', 'name')->get();
        $jobs = Job::select('id', 'name')->get();
        $hospitals = Hospital::select('id', 'name')->get();
        return view('back_end.users.create', compact('roles', 'countries', 'jobs', 'hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'phone' => 'required',
            'country_id' => 'required |exists:countries,id',
            'job_id' => 'required | exists:jobs,id',
            'hospital_id' => 'required | exists:hospitals,id',
            'role_id' => 'required | exists:roles,id',
            'type' => 'required|in:admin,user',

        ]);
        // dd($request->all());

        $data = [
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'phone'       => $request->phone,
            'country_id'  => $request->country_id,
            'job_id'      => $request->job_id,
            'role_id'      => $request->role_id,
            'hospital_id' => $request->hospital_id,
            'type' => $request->type,
            'email_verified_at' => now(),
        ];
        if ($request->id) {
            $user = User::findOrFail($request->id);
            $user->update($data);
            if ($request->has('uploaded_images')) {
                $images = array_filter($request->uploaded_images);
                foreach ($images as $filename) {
                    $user->image()->create([
                        'image' => $filename
                    ]);
                }
            }
            $role = Role::find($request->role_id);
            $user->syncRoles($role->name);
            $msg = 'User updated successfully';
        } else {
            $user = User::create($data);
            if ($request->has('uploaded_images')) {
                $images = array_filter($request->uploaded_images);
                foreach ($images as $filename) {
                    $user->image()->create([
                        'image' => $filename
                    ]);
                }
            }
            $role = Role::find($request->role_id);
            $user->assignRole($role->name);
            $msg = 'User created successfully';
        }
        return redirect()->route('users.index')->with([
            'status' => 'success',
            'msg' => $msg,
            'data' => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::select('id', 'name')->get();
        $countries = Country::select('id', 'name')->get();
        $jobs = Job::select('id', 'name')->get();
        $hospitals = Hospital::select('id', 'name')->get();
        return view('back_end.users.create', compact('roles', 'countries', 'jobs', 'hospitals', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findorFail($id);
        $user->delete();
        return $user;
    }
}
