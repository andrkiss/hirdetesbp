<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\District;
use App\Models\Category;
use App\Models\State;
use App\Models\Ad;

class Kereso extends Component
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
        $KategK = Category::get();
        $KerulK = District::get();
        $AllapK = State::get();

        return view('components.kereso')->with([
            'KategK' => $KategK,
            'KerulK' => $KerulK,
            'AllapK' => $AllapK
        ]);
    }
}
