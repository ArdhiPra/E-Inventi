<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function show()
    {
        return view('user.profile.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'alamat' => 'required|string|max:255',
        ]);

        $user->update([
            'name' => $request->username,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return back()->with('success_message', 'Profil berhasil diperbarui!');
    }
}
