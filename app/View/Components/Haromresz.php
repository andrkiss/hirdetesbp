<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Haromresz extends Component
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
        $alerts = ['success'=>'green', 'danger'=>'red', 'warning'=>'yellow', 'info'=>'gray'];

        return view('components.haromresz')->with([
            'alerts' => $alerts
        ]);
    }
}
