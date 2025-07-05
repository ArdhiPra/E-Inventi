<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    // Menampilkan profil admin
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    // Menampilkan form edit profil
    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    // Menyimpan perubahan data profil admin
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        /** @var \App\Models\User $user */
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
