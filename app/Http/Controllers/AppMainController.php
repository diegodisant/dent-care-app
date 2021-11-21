<?php
declare(stric_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppMainController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
