<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }
}
