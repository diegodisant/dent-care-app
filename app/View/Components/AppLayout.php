<?php
declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class AppLayout extends Component
{
    public function render(): View | Factory
    {
        return view('layouts.app');
    }
}
