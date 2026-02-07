<?php

namespace App\Http\Controllers;
use App\Models\Classe;

use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'anne' => 'required|string|max:255',
        'formation_id' => 'required|exists:formations,id',
    ]);
    try {
        Classe::create([
            'name' => $validated['name'],
            'anneDetudiant' => $validated['anne'],
            'formation_id' => $validated['formation_id'],
        ]);

        return redirect()->back()->with('success', 'Classe créée avec succès !');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Erreur lors de la création de la classe.');
    }
}


}
