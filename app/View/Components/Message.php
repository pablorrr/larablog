<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Message extends Component
{
    public $name; //odniesienie sie do message.blafde linia 437
    public $fruits;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $fruits)
    {
        $this->name = $name;
        $this->fruits = $fruits;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.message');
    }
}
