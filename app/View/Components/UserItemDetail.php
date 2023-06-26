<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserItemDetail extends Component
{
    public $isAuth;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($isAuth = null)
    {
        $this->isAuth = $isAuth;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.user.item-detail');
    }
}
