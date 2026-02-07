<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;

class FormationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Formation::create([
            'title' => $request->title,
            'is_active' => true,
        ]);
        return redirect()->back()->with('success', 'Formation created');
    }
}
