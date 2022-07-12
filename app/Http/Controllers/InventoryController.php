<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\SupplyDemandCalculation;
use App\Models\TodayHistory;
use App\Models\TodayInventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function all()
    {
        $q = Inventory::latest()->get();
        return response()->json($q, 200);
    }

    public function store()
    {
        $data = request()->validate([
            'item_name' => ['required'],
            'actual_price' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'qty' => ['required', 'integer'],
            'order_available' => ['boolean']
        ]);
        if (request()->order_available) {
            $data['order_available'] = true;
        }
        // $this->supply_demand_calculator(request()->qty * request()->actual_price);
        $inventory =  Inventory::create($data);
        if ($inventory->wasRecentlyCreated) {
            TodayInventory::create([
                'qty' => $inventory->qty,
                'inventory_id' => $inventory->id
            ]);
        }
        return $inventory;
    }

    public function update(Inventory $inventory)
    {
        $data = request()->validate([
            'item_name' => ['required'],
            'price' => ['required', 'integer'],
            'actual_price' => ['required', 'integer'],
            'qty' => ['required', 'integer'],
            'order_available' => ['boolean']
        ]);
        // $this->supply_demand_calculator((request()->qty - $inventory->qty) * request()->actual_price);
        $this->checking_qty_for_todayInventory(request()->qty, $inventory->id, $inventory->qty);
        $inventory->update($data);
        return response([
            'status' => 200,
            'data' => $inventory,
        ]);
    }

    static function checking_qty_for_todayInventory($qty, $id, $o_qty)
    {
        $qty_checker = $qty - $o_qty;
        $d = TodayInventory::where('inventory_id', $id)->first() ?? null;
        if ($d) {
            if ($qty_checker >= 1) {
                $d->qty = $d->qty + $qty_checker;
                $d->save();
            }
            if ($qty_checker <= 0) {
                $test = $d->qty + $qty_checker;
                if ($test <= 0) {
                    $d->delete();
                } else {
                    $d->qty = $test;
                    $d->save();
                }
            }
        } else {
            TodayInventory::create([
                'inventory_id' => $id,
                'qty' => $qty
            ]);
        }
    }

    public function delete(Request $request)
    {
        $ids = $request->id;
        foreach ($ids as $id) {
            $d = Inventory::findOrFail($id);
            $this->supply_demand_calculator(- ($d->qty * $d->actual_price));
            $d->delete();
        }

        return response([
            'status' => 200,
            'ids' => $request->id,
            'total' => Inventory::count()
        ]);
    }

    // static function supply_demand_calculator($action)
    // {
    //     $d = SupplyDemandCalculation::findOrFail(1)->first();
    //     $d->supply = $d->supply + $action;
    //     $d->save();
    // }

    public function test()
    {
        $tests =  TodayHistory::with('inventory')->latest()->get()->groupBy('random_values')->take(2);
        $k = array();
        foreach ($tests as $key => $v) {
            $t = $v->reduce(function ($carry, $item) {
                return $carry + $item->sub_total;
            }, 0);
            $k[] = $t;
        }
        return $k;
    }
}
