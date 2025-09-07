<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('desa')->orderBy('name')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('admin.users.create', compact('desas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin_kecamatan,admin_desa',
            'desa_id' => 'required_if:role,admin_desa|exists:desas,id',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'desa_id' => $request->role === 'admin_desa' ? $request->desa_id : null,
            'phone' => $request->phone,
            'address' => $request->address,
            'is_active' => true,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    public function show(User $user)
    {
        $user->load('desa');
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('admin.users.edit', compact('user', 'desas'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin_kecamatan,admin_desa',
            'desa_id' => 'required_if:role,admin_desa|exists:desas,id',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'desa_id' => $request->role === 'admin_desa' ? $request->desa_id : null,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $currentUser = Auth::user();
        if ($user->id === $currentUser->id) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Anda tidak dapat menghapus akun sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil dihapus.');
    }

    public function toggleStatus(User $user)
    {
        $currentUser = Auth::user();
        if ($user->id === $currentUser->id) {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak dapat mengubah status akun sendiri.'
            ]);
        }

        $user->update(['is_active' => !$user->is_active]);

        return response()->json([
            'success' => true,
            'message' => 'Status user berhasil diubah.',
            'is_active' => $user->is_active
        ]);
    }

    public function resetPassword(User $user)
    {
        $newPassword = 'password123';
        $user->update(['password' => Hash::make($newPassword)]);

        return response()->json([
            'success' => true,
            'message' => "Password berhasil direset menjadi: {$newPassword}"
        ]);
    }
}