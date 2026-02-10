<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commpetonse;

class CommpetonseController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'formation_id' => 'required|exists:formations,id',
        ]);
        // dd($validated);
        // die();
        try {
            Commpetonse::create([
                'name' => $validated['name'],
                'formation_id' => $validated['formation_id'],
            ]);
            // echo "Compétence créée avec succès !";
            // die();

            return redirect()->back()->with('success', 'Compétence créée avec succès !');
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'Erreur lors de la création de la compétence.');
        }
    }
}
