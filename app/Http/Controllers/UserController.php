<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        // Ambil semua user untuk ditampilkan di view
        $users = User::paginate(15);
        return view('admin.user.user', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     * (Tidak digunakan karena pakai modal)
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created user.
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
              'role'     => 'required|string',
        ]);

        $valid['password'] = bcrypt($valid['password']);

        User::create($valid);

        return redirect()->route('user.index')->with('pesan', '<div class="alert alert-success p-3 mt-3" role="alert">User berhasil ditambahkan.</div>');
    }

    /**
     * Display the specified user. (Opsional)
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified user. (Tidak digunakan karena pakai modal)
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $valid = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required|string',
        ]);

        $user->update($valid);

        return redirect()->route('user.index')->with('pesan', '<div class="alert alert-info p-3 mt-3" role="alert">User berhasil diperbarui.</div>');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('pesan', '<div class="alert alert-danger p-3 mt-3" role="alert">User berhasil dihapus.</div>');
    }
}
