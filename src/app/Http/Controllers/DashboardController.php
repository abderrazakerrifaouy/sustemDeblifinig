<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Formation;
use App\Models\Classe;
use App\Models\Commpetonse;

class DashboardController extends Controller
{
    public function Admine()
    {
        return view('admin.index');
    }
    public function manageUsers()
    {
        $users = User::all()->where('role', '!=', 'admin');

        return view('admin.manage_users', compact('users'));
    }
    public function manageFormations()
    {
        $formations = Formation::all();
        return view('admin.manage_formation', compact('formations'));
    }
    public function manageClasses()
    {
        $classes = Classe::with([
            'formation',
            'formateurs' => function ($q) {
                $q->where('role', 'Formateur');
            },
        ])->get();
        $formations = Formation::all();
        return view('admin.manage_classes', compact('classes', 'formations'));
    }

    public function manageCompetences($id = null)
    {

        $formations = Formation::all();
        if ($id) {
            $selectedFormationId = $id;
        } else {
            $selectedFormationId = $formations->first()->id ?? null;
        }
        $competons = Commpetonse::where('formation_id', $selectedFormationId)->get();
        return view('admin.manage_competences', compact('formations' , 'selectedFormationId', 'competons'));
    }
    public function manageSprints()
    {
        return view('admin.manage_sprints');
    }
}
