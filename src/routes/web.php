<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmine;


Route::middleware('guest')->group(function () {
Route::get('/login', [VisiteurController::class, 'login'])->name('login');
Route::post('/login', [VisiteurController::class, 'authenticate'])->name('visiteur.authenticate');
Route::post('/logout', [VisiteurController::class, 'logout'])->name('visiteur.logout');
});

Route::middleware('auth' , IsAdmine::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'Admine'])->name('dashboard');
    Route::get('/manage_users', [DashboardController::class, 'manageUsers'])->name('manage.users');
    Route::post('/user/create', [UserController::class, 'create'])->name('user.create');

});
