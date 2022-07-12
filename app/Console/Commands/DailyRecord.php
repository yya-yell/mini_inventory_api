<?php

namespace App\Console\Commands;

use App\Models\DailyInventory;
use App\Models\History;
use App\Models\SupplyDemandCalculation;
use App\Models\TodayHistory;
use App\Models\TodayInventory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DailyRecord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:dailyrecord';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Daily Record';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::beginTransaction();
        try {
            foreach (TodayHistory::with('inventory')->get() as $data) {
                History::create([
                    'date' => date_format($data->created_at, 'd/m/y'),
                    'inventory_id' => $data->inventory_id,
                    'qty' => $data->qty,
                    'price' => $data->inventory->price,
                    'sub_total' => $data->sub_total
                ]);
            }
            $datas = TodayInventory::with('inventory')->get();
            foreach ($datas as $data) {
                DailyInventory::create([
                    'date' => date_format($data->created_at, 'd/m/y'),
                    'inventory_id' => $data->inventory_id,
                    'qty' => $data->qty,
                ]);
            }

            $d = SupplyDemandCalculation::where('id', 1)->first();
            $d->supply = $d->supply + Supply();
            $d->demand = $d->demand +  Demand();
            $d->save();
            TodayHistory::truncate();
            TodayInventory::truncate();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }
}
