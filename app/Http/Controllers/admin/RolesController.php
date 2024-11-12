<?php

namespace App\Http\Controllers\admin;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index()
    {
        if(!auth()->user()->can('roles.view_all')) {
            abort(403);
        }

        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function edit(Role $role)
    {
        if(!auth()->user()->can('roles.update')) {
            abort(403);
        }
        $permissions = Permission::select('id', 'name')->get();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Role $role)
    {
        if(!auth()->user()->can('roles.update')) {
            abort(403);
        }
        $role->syncPermissions(array_keys(request('permissions')));
        return redirect()->route('roles.index');
    }
}
