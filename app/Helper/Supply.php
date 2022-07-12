<?php

use App\Models\TodayInventory;

function supply() {
    return TodayInventory::with('inventory')->get()->reduce(function ($carry, $item) {
                return $carry + ($item->qty * $item->inventory->actual_price);
            }, 0);
}