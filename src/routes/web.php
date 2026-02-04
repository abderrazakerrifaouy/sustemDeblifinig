<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\DashboardController;


Route::middleware('guest')->group(function () {
Route::get('/login', [VisiteurController::class, 'login'])->name('visiteur.login');
Route::post('/login', [VisiteurController::class, 'authenticate'])->name('visiteur.authenticate');
Route::post('/logout', [VisiteurController::class, 'logout'])->name('visiteur.logout');
});

Route::middleware('Is_admine')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
