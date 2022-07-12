<?php

namespace App\Http\Controllers;

use Carbon\Cli\Invoker;
use App\Models\Inventory;
use App\Models\SupplyDemandCalculation;
use App\Models\TodayHistory;
use App\Models\WastedItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return response([
            'status' => 200,
            'supply' => SupplyDemandCalculation::first()->supply,
            'demand' =>  SupplyDemandCalculation::first()->demand,
            'total_items' => Inventory::count(),
            'wasted' => WastedItems::latest()->get()
        ]);
    }
}
