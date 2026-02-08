<?php

namespace App\Http\Controllers;
use App\Models\Classe;
use App\Models\Formation;
use App\Models\User;

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
    public function show($id)
    {
        $formateurs = User::with([
            'classes' => function ($q) {
                $q->wherePivot('is_principal', true);
            },
        ])
            ->where('role', 'Formateur')
            ->get();
        // dd($formateurs);
        // die();
        $classe = Classe::with('formation', 'formateurs')->findOrFail($id);
        return view('admin.show_classe', compact('classe' , 'formateurs'));
    }
    public function addFormateur(Request $request, $id)
    {
        $validated = $request->validate([
            'formateur_id'  ,
            'is_principal'  ,
        ]);
        dd($validated);
        die();
        $classe = Classe::findOrFail($id);
        $classe->formateurs()->attach($validated['formateur_id'], [
            'is_principal' => $validated['is_principal'],
        ]);
        dd($classe);
        die();
        return redirect()->back()->with('success', 'Formateur ajouté avec succès !');
        
    }
}
