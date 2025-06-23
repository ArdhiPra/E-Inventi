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
     * Tampilkan form ubah password (jika sudah punya password).
     */
    public function showChangePasswordForm()
    {
        return view('user.profile.change_password');
    }

    /**
     * Proses update password untuk user yang sudah punya password.
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

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Cegah set password jika user sudah memiliki password
        if (!is_null($user->password)) {
            return redirect()
                ->route('user.password.edit')
                ->withErrors(['new_password' => 'Anda sudah memiliki password.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()
            ->route('user.password.edit')
            ->with('success', 'Password berhasil disimpan.');
    }
}
