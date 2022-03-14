<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{//https://beyondco.de/blog/using-laravel-view-components
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
