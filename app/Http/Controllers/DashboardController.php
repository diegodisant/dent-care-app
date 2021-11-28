<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class DashboardController extends Controller
{
    public function index(): View | Factory
    {
        return view('dashboard');
    }

    public function users(): View | Factory
    {
        return view('dashboard.users');
    }

    public function appointments(): View | Factory
    {
        return view('dashboard.appointments');
    }

    public function calendar(): View | Factory
    {
        return view('dashboard.calendar');
    }

    public function patients(): View | Factory
    {
        return view('dashboard.patients');
    }
}
