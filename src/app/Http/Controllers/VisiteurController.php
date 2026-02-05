<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisiteurController extends Controller
{
    public function login()
        {
            return view('visiteur.login');
        }
    public function authenticate(Request $request)
        {
            $credentials = $request->only('email', 'password');

            if (auth()->attempt($credentials)) {
                return redirect()->intended('dashboard');
            }

            echo "Invalid credentials";
        }
}
