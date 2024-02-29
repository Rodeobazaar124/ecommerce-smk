<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class bsLayout extends Component
{
    public function render(): View|Closure|string
    {
        return view('components.bs-layout');
    }
}
