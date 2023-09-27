<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $breadcrumbs = [
            ['url' => route('user.index'), 'label' => 'Users'],
        ];
        $data = [
            'title' => 'User List',
            'users' => $users,
            'breadcrumbs' => $breadcrumbs,
        ];
        return view('user.index', $data);
    }

    public function create()
    {
        $breadcrumbs = [
            ['url' => route('user.index'), 'label' => 'Users'],
            ['url' => route('user.create'), 'label' => 'Add User'],
        ];

        $data = [
            'title' => 'Add User',
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('user.create', $data);
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:15',
        ]);

        // Simpan data pengguna
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Menampilkan notifikasi iziToast
        $notification = [
            'title' => 'Success',
            'message' => 'User created successfully.',
            'position' => 'bottomRight'
        ];

        return redirect()->route('user.index')->with('notification', $notification);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $breadcrumbs = [
            ['url' => route('user.index'), 'label' => 'Users'],
            ['url' => route('user.edit', $id), 'label' => 'Edit User'],
        ];
        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'breadcrumbs' => $breadcrumbs,
        ];
        return view('user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|max:15',
        ]);

        // Perbarui data pengguna
        $userData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ];

        if ($request->has('password')) {
            $userData['password'] = bcrypt($validatedData['password']);
        }

        User::where('id', $id)->update($userData);

        $notification = [
            'title' => 'Success',
            'message' => 'User update successfully.',
            'position' => 'bottomRight'
        ];

        return redirect()->route('user.index')->with('notification', $notification);
    }

    public function destroy($id)
    {
        // Hapus data pengguna
        User::findOrFail($id)->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}