<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.profile', compact('user'));
    }

    public function update(Request $request)
{
    /** @var \App\Models\User $user */
    $user = Auth::user(); // pastikan ini instance User

    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'password' => 'nullable|string|min:6|confirmed',
        ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save(); 

    return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}