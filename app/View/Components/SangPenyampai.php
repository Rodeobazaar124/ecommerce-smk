<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SangPenyampai extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'blade'
        @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif

        @if(Session::has('message'))
        <p>{{ Session::get('message') }}</p>
        @endif
blade;
    }
}
