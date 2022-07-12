<?php
use App\Models\TodayHistory;

function demand() {
    return TodayHistory::with('inventory')->get()->map(function ($query) {
        return $query->sub_total - ($query->qty * $query->inventory->actual_price);
    })->sum();
}