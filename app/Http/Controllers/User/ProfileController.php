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

    /**
     * Proses update data profil user.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Tampilkan form ubah password.
     */
    public function showChangePasswordForm()
    {
        return view('user.profile.change_password');
    }

    /**
     * Proses update password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password berhasil diperbarui.');
    }

    /**
     * Set password pertama kali untuk user login via Google.
     */
    public function setPassword(Request $request)
    {
        $request->validate([
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        if (!is_null($user->password)) {
            return redirect()
                ->route('user.password.edit')
                ->withErrors(['new_password' => 'Anda sudah memiliki password.']);
        }

        /** @var \App\Models\User $user */
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()
            ->route('user.password.edit')
            ->with('success', 'Password berhasil disimpan.');
    }
}
