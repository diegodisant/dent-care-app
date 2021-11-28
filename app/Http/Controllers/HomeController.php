<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class HomeController extends Controller
{
    public function index(): View | Factory
    {
        return view('auth.login');
    }
}
