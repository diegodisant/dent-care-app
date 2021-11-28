<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/dashboard/users', [DashboardController::class, 'users'])
    ->middleware(['auth'])
    ->name('dashboard.users');

Route::get('/dashboard/appointments', [DashboardController::class, 'appointments'])
    ->middleware(['auth'])
    ->name('dashboard.appointments');

Route::get('/dashboard/calendar', [DashboardController::class, 'calendar'])
    ->middleware(['auth'])
    ->name('dashboard.calendar');

Route::get('/dashboard/patients', [DashboardController::class, 'patients'])
    ->middleware(['auth'])
    ->name('dashboard.patients');

