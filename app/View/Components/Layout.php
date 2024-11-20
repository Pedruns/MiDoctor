<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public function __construct(public string $title)
    {
        $this->$title = $title;
    }

    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}