<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $breadcrumbs = [
            ['url' => route('roles.index'), 'label' => 'Roles'],
        ];
        $data = [
            'title' => 'Role List',
            'roles' => $roles,
            'breadcrumbs' => $breadcrumbs,
        ];
        return view('roles.index', $data);
    }

    public function create()
    {
        $permissions = Permission::all();
        $breadcrumbs = [
            ['url' => route('roles.index'), 'label' => 'Role'],
            ['url' => route('roles.create'), 'label' => 'Add Role'],
        ];

        $data = [
            'title' => 'Add Role',
            'permissions' => $permissions,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('roles.create', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'description' => 'nullable|string|max:255',
            'permissions' => 'required|array',
            'enabled' => 'required|string',
        ]);

        $role = Role::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'enabled' => $validatedData['enabled'],
        ]);

        $role->permissions()->attach($validatedData['permissions']);

        $notification = [
            'title' => 'Success',
            'message' => 'Role created successfully.',
            'position' => 'bottomRight'
        ];

        return redirect()->route('roles.index')->with('notification', $notification);
    }


    public function show($id)
    {
        $role = Role::findOrFail($id);

        $breadcrumbs = [
            ['url' => route('roles.index'), 'label' => 'Role'],
            ['url' => route('roles.edit', $id), 'label' => 'View Role'],
        ];
        $data = [
            'title' => 'View Role',
            'role' => $role,
            'breadcrumbs' => $breadcrumbs,
        ];
        return view('roles.show', $data);

    }


    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        $breadcrumbs = [
            ['url' => route('roles.index'), 'label' => 'Role'],
            ['url' => route('roles.edit', $id), 'label' => 'Edit Role'],
        ];
        $data = [
            'title' => 'Edit Role',
            'role' => $role,
            'permissions' => $permissions,
            'breadcrumbs' => $breadcrumbs,
        ];
        return view('roles.edit', $data);

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'description' => 'nullable|string|max:255',
            'permissions' => 'required|array',
            'enabled' => 'required|boolean',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $validatedData['name'];
        $role->description = $validatedData['description'];
        $role->enabled = $validatedData['enabled'];
        $role->save();

        $role->permissions()->sync($validatedData['permissions']);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}