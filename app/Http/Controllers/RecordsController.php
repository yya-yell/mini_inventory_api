<?php

namespace App\Http\Controllers;

use App\Models\DailyInventory;
use App\Models\History;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\TodayInventory;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Support\Facades\DB;

class RecordsController extends Controller
{
    public function daily_records()
    {
        return response([
            'status' => 200,
            'data' => History::with('inventory')->latest()->get()->groupBy('date'),
            'daily_inventory' => DailyInventory::with('inventory')->latest()->get()->groupBy('date')
        ]);
    }

    public function test()
    {

        return DB::table('histories')
            ->join('daily_inventories', 'histories.date', '=', 'daily_inventories.date')
            ->select('histories.*', 'daily_inventories.qty as daily_inventories_qty')
            ->get();
        return TodayInventory::with('inventory')->get();
    }
}
