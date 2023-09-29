<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        $breadcrumbs = [
            ['url' => route('users.index'), 'label' => 'Users'],
        ];
        $data = [
            'title' => 'User List',
            'users' => $users,
            'breadcrumbs' => $breadcrumbs,
        ];
        return view('users.index', $data);
    }

    public function create()
    {
        $roles = Role::all();
        $breadcrumbs = [
            ['url' => route('users.index'), 'label' => 'Users'],
            ['url' => route('users.create'), 'label' => 'Add User'],
        ];

        $data = [
            'title' => 'Add User',
            'roles' => $roles,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('users.create', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:15',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $user->roles()->attach($validatedData['role_id']);

        $notification = [
            'title' => 'Success',
            'message' => 'User created successfully.',
            'position' => 'bottomRight'
        ];

        return redirect()->route('users.index')->with('notification', $notification);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        $breadcrumbs = [
            ['url' => route('users.index'), 'label' => 'Users'],
            ['url' => route('users.show', $id), 'label' => 'View Users'],
        ];
        $data = [
            'title' => 'View Permission',
            'user' => $user,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('users.show', $data);
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $breadcrumbs = [
            ['url' => route('users.index'), 'label' => 'Users'],
            ['url' => route('users.edit', $id), 'label' => 'Edit User'],
        ];
        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'roles' => $roles,
            'breadcrumbs' => $breadcrumbs,
        ];
        return view('users.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|max:15',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->save();

        $user->roles()->sync($validatedData['role_id']);

        $notification = [
            'title' => 'Success',
            'message' => 'User update successfully.',
            'position' => 'bottomRight'
        ];

        return redirect()->route('users.index')->with('notification', $notification);
    }

    public function destroy($id)
    {
        // Hapus data pengguna
        User::findOrFail($id)->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}