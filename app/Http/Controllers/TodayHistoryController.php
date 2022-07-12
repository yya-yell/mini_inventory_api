<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Support\Str;
use App\Models\TodayHistory;
use App\Models\WastedItems;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TodayHistoryController extends Controller
{
    static function sum()
    {
        return TodayHistory::sum('sub_total');
    }

    public function all()
    {
        return response([
            'status' => 200,
            'todayHistory' => TodayHistory::with('inventory')->latest()->get()->groupBy('random_values'),
            'sum' => $this->sum(),
            'today_demand' => Demand(),
            'today_supply' => Supply(),
            // 'today_supply' => Inventory::whereDate('updated_at' , today())->get()->map(function($data){
            //     return $data->actual_price * $data->qty;
            // })->sum()
        ]);
    }

    public function store()
    {
        $timestamp = $this->time();
        foreach (request()->items as $data) {
            $inv = Inventory::findOrFail($data['id']);
            $qty =  $data['qty'] > 1  ?  $data['qty']  : 1;
            $inv->qty = $inv->qty - $qty;
            $inv->save();
            $holder =  TodayHistory::create([
                'random_values' => $timestamp,
                'inventory_id' => $data['id'],
                'qty' => $qty,
                'note' => $data['note'],
                'sub_total' =>  $qty *  $inv->price
            ]);
            $id[] = $holder;
        }
        return response([
            'status' => 200,
            'id' => $id,
        ]);
    }

    public function update()
    {
            foreach (request()->data as $data) {
                $th = TodayHistory::findOrFail($data['id']);
                $this->QTY_SUM_SUBSTRACT($data['inventory']['id'], $th->qty, $data['qty']);
                $th->note = $data['note'];
                $th->qty = $data['qty'];
                $th->sub_total = $data['qty'] * $data['inventory']['price'];
                $th->save();
            }
        return response([
            'status' => 200,
            'sum' => $this->sum()
        ]);
    }

    public function DeleteReturn()
    {
        $inventory = TodayHistory::findOrFail(request()->id);
        $holder = Inventory::findOrFail($inventory->inventory->id);
        $holder->qty = $holder->qty + $inventory->qty;
        $holder->save();
        $inventory->delete();
        return response([
            'status' => 200,
            'id' => request()->id,
            'sum' => $this->sum()
        ]);
    }
    public function WasteReturn()
    {
        $th = TodayHistory::where('id', request()->id)->with('inventory')->first();
        WastedItems::create([
            'item_name' => $th->inventory->item_name,
            'actual_price' => $th->inventory->actual_price,
            'qty' => $th->qty,
            'price' => $th->inventory->price,
        ]);
        $th->delete();
        return response([
            'status' => 200,
            'id' => request()->id,
            'sum' => $this->sum()
        ]);
    }

    static function  QTY_SUM_SUBSTRACT($id, $qty_from_th, $qty_from_request)
    {
        $realQty = Inventory::findOrFail($id);
        if ($qty_from_th > $qty_from_request) {
            $realQty->qty = $realQty->qty + ($qty_from_th - $qty_from_request);
        }
        if ($qty_from_th < $qty_from_request) {
            $realQty->qty = $realQty->qty - ($qty_from_request - $qty_from_th);
        }
        $realQty->save();
    }

    static function time()
    {
        return \Carbon\Carbon::now()->toDateTimeString();
    }
}
