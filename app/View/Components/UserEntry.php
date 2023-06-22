<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserEntry extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
</div>
blade;
    }
}
