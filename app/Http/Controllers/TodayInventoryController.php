<?php

namespace App\Http\Controllers;

use App\Models\TodayInventory;

class TodayInventoryController extends Controller
{
    public function index(){
        return TodayInventory::with('inventory')->latest()->get();
    }
}
