<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    // public function index()
    // {
    //     $roles = Role::with('permissions')->get();
    //     $permissions = Permission::all();

    //     return view('report.index', compact('roles', 'permissions'));
    // }

    // public function storeRole(Request $request)
    // {
    //     $request->validate(['name' => 'required|unique:roles']);
    //     Role::create(['name' => $request->name]);
    //     return back()->with('success', 'Role added successfully!');
    // }

    // public function storePermission(Request $request)
    // {
    //     $request->validate(['name' => 'required|unique:permissions']);
    //     Permission::create(['name' => $request->name]);
    //     return back()->with('success', 'Permission added successfully!');
    // }

    // public function assignPermissions(Request $request, Role $role)
    // {
    //     $role->syncPermissions($request->permissions);
        
    //     return back()->with('success', 'Permissions updated successfully!');
    // }

    // public function deleteRole(Role $role)
    // {
    //     $role->delete();
    //     return back()->with('success', 'Role deleted successfully!');
    // }

    // public function deletePermission(Permission $permission)
    // {
    //     $permission->delete();
    //     return back()->with('success', 'Permission deleted successfully!');
    // }
}
