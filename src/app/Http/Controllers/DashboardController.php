<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Formation;
use App\Models\Classe;



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

        dd($classes);
        die();
        return view('admin.manage_classes', compact('classes', 'formations'));
    }
}
