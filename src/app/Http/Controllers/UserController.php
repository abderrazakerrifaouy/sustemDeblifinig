<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{


public function create(Request $request)
{
    // ✅ Validation
    $validatedData = $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'role'     => 'required|in:Formateur,Etudiant',
    ]);

    // ✅ Création de l'utilisateur
    User::create([
        'name'     => $validatedData['name'],
        'email'    => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'role'     => $validatedData['role'],
    ]);

    // ✅ Redirection avec message success
    return redirect()
        ->route('manage.users')
        ->with('success', 'Utilisateur créé avec succès.');
}

}

