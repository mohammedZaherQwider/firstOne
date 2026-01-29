<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('users')->get();
        return view('back_end.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::select('id', 'name')->get();
        return view('back_end.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
        ];
        if ($request->id) {
            $role = Role::findOrFail($request->id);
            $role->update($data);
            if ($request->permissions) {
                $permissions = Permission::whereIn('id', $request->permissions)
                    ->pluck('name')
                    ->toArray();
                $role->syncPermissions($permissions);
            }
            $msg = 'Role updated successfully';
        } else {
            $role = Role::create($data);
            $permissions = Permission::whereIn('id', $request->permissions)
                ->pluck('name')
                ->toArray();
            $role->givePermissionTo($permissions);
            $msg = 'Role created successfully';
        }
        return redirect()->route('roles.index')->with([
            'status' => 'success',
            'msg' => $msg,
            'data' => $role
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Role $role) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::select('id', 'name')->get();
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        return view('back_end.roles.create', compact('role', 'permissions', 'rolePermissions'));
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
        $role = Role::findorFail($id);
        $role->delete();
        return $role;
    }
}
