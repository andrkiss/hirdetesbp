<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

use App\Models\Category;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $KategN = Category::get();

        return view('layouts.app')->with([
            'KategN' => $KategN,
        ]);
    }
}
