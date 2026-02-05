<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function Admine(){
        return view('admin.index');
    }
    public function manageUsers(){
        $users = User::all()->where('role', '!=', 'admin');
        return view('admin.manage_users', compact('users'));
    }
}


