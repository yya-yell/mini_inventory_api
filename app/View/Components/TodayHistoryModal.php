<?php

namespace App\View\Components;

use App\Models\Inventory;
use Illuminate\View\Component;

class TodayHistoryModal extends Component
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
        $requests = request(['oldest', 'newest', 'price' , 'search' , 'order_available' , 'normal_items']);
        return view('components.today-history-modal',[
            'inventories' => Inventory::filter($requests)->get()
        ]);
    }
}
