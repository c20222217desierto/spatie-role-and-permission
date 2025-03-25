<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class ReportController extends Controller
{
    public function index()
    {
       
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        // $users = User::with('roles')->get();

        return view('report.index', compact('roles', 'permissions'));
    }

    public function storeRole(Request $request)
    {
        $request->validate(['name' => 'required|unique:roles,name']);
        Role::create(['name' => $request->name]);
        return back()->with('success', 'Role created successfully.');
    }

    public function storePermission(Request $request)
    {
        $request->validate(['name' => 'required|unique:permissions,name']);
        Permission::create(['name' => $request->name]);
        return back()->with('success', 'Permission created successfully.');
    }

    public function assignPermission(Request $request)
    {
        $role = Role::findOrFail($request->role_id);
        $role->syncPermissions($request->permissions ?? []);
        // pwede man na $role->givePermissionTo($request->permissions);
        return back()->with('success', 'Permissions updated successfully.');
    }
    public function updateRole(Request $request)
    {
        $role = Role::findOrFail($request->id);
        $role->update(['name' => $request->name]);
        return back()->with('success', 'Role updated successfully.');
    }

    public function updatePermission(Request $request)
    {
        $permission = Permission::findOrFail($request->id);
        $permission->update(['name' => $request->name]);
        return back()->with('success', 'Permission updated successfully.');
    }

    public function destroyRole($id)
    {
        Role::findOrFail($id)->delete();
        return back()->with('success', 'Role deleted successfully.');
    }

    public function destroyPermission($id)
    {
        Permission::findOrFail($id)->delete();
        return back()->with('success', 'Permission deleted successfully.');
    }
}
