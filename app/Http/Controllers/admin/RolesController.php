<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        // if(!auth()->user()->can('students.view_all')) {
        //     abort(403);
        // }

        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::select('id', 'name')->get();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Role $role)
    {
        $role->syncPermissions(array_keys(request('permissions')));
        return redirect()->route('roles.index');
    }
}
