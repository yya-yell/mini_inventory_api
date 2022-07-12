<?php

namespace App\View\Components\helper;

use App\Models\Inventory;
use Carbon\Cli\Invoker;
use Illuminate\View\Component;

class Navigator extends Component
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
        return view('components.helper.navigator' , [
            'count' => Inventory::count()
        ]);
    }
}
