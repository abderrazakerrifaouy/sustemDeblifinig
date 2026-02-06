<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\formation;
use App\Models\classe;

class DashboardController extends Controller
{
    public function Admine(){
        return view('admin.index');
    }
    public function manageUsers(){
        $users = User::all()->where('role', '!=', 'admin');

        return view('admin.manage_users', compact('users'));
    }
    public function manageFormations(){
        $formations = formation::all();
        return view('admin.manage_formation', compact('formations'));
    }
    public function manageClasses(){
        $classes = classe::all();
        $teachers = User::all()->where('role', 'Formateur');
        $formations = formation::all();
        return view('admin.manage_classes', compact('classes', 'teachers', 'formations'));
    }
}




