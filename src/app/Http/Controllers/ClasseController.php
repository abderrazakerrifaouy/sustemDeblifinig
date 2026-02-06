<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'formation_id' => 'required|exists:formations,id',
            'teacher_id' => 'required|exists:users,id',
        ]);

        Classe::create([
            'name' => $request->name,
            'formation_id' => $request->formation_id,
            'teacher_id' => $request->teacher_id,
        ]);
        return redirect()->back()->with('success', 'Classe created');
    }
    
}
