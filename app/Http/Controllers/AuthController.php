<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;

    class AuthController extends Controller
    {
    public function beranda() {
    return view('beranda'); // atau beranda.blade.php
    }

    public function showLogin() {
    if (Auth::check()) {
        return Auth::user()->role === 'admin'
            ? redirect('/admin/dashboard')
            : redirect('/user/dashboard');
    }
    return view('auth.login'); // <--- penting!
}

        public function login(Request $request) {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

        if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Cek role setelah login
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->intended('/user/dashboard');
        }
    }

            return back()->withErrors(['email' => 'Email atau Password salah.'])->withInput();
        }

        public function showRegister() {
            return view('auth.register');
        }

        public function register(Request $request) {
            $request->validate([
                'name' => ['required', 'string', 'max:100'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'min:6', 'confirmed'],
            ]);

            User::create([
            'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',// default role
            ]);

            return redirect('/login')->with('success', 'Registrasi berhasil. Silakan Login.');
        }

        public function logout(Request $request) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
    }
