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
            'anne' => 'required|integer|min:2020|max:2030',
        ]);

        Classe::create([
            'name' => $request->name,
            'formation_id' => $request->formation_id,
            'anneDetudiant' => $request->anne,
        ]);
        return redirect()->back()->with('success', 'Classe created');
    }

}
