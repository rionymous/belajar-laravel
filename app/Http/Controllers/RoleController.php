<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $breadcrumbs = [
            ['url' => route('role.index'), 'label' => 'Roles'],
        ];
        $data = [
            'title' => 'Role List',
            'roles' => $roles,
            'breadcrumbs' => $breadcrumbs,
        ];
        return view('role.index', $data);
    }

    public function create()
    {
        $breadcrumbs = [
            ['url' => route('role.index'), 'label' => 'Role'],
            ['url' => route('role.create'), 'label' => 'Add Role'],
        ];

        $data = [
            'title' => 'Add Role',
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('role.create', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'enabled' => 'required|boolean',
        ]);

        Role::create([
            'name' => $validatedData['name'],
            'enabled' => $validatedData['enabled'],
        ]);

        $notification = [
            'title' => 'Success',
            'message' => 'Role created successfully.',
            'position' => 'bottomRight'
        ];

        return redirect()->route('role.index')->with('notification', $notification);
    }


    public function edit($id)
    {
        $role = Role::findOrFail($id);

        $breadcrumbs = [
            ['url' => route('role.index'), 'label' => 'Role'],
            ['url' => route('role.edit', $id), 'label' => 'Edit Role'],
        ];
        $data = [
            'title' => 'Edit Role',
            'role' => $role,
            'breadcrumbs' => $breadcrumbs,
        ];
        return view('role.edit', $data);

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'enabled' => 'required|boolean',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $validatedData['name'];
        $role->enabled = $validatedData['enabled'];
        $role->save();

        return redirect()->route('role.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        // Hapus data pengguna
        Role::findOrFail($id)->delete();

        return redirect()->route('role.index')->with('success', 'Role deleted successfully.');
    }
}