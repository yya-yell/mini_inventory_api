<?php

namespace App\Console\Commands;

use App\Models\History as HistoryCreate;
use App\Models\TodayHistory;
use Illuminate\Console\Command;

class history extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'history:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shifting datas from today history to history';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (TodayHistory::with('inventory')->get() as $data) {
            HistoryCreate::create([
                'date' => date_format($data->created_at, 'd/m/y'),
                'inventory_id' => $data->inventory_id,
                'qty' => $data->qty,
                'price' => $data->inventory->price,
                'sub_total' => $data->sub_total
            ]);
        }
        TodayHistory::with('inventory')->get()->map(function($query){
            return $query->sub_total - ($query->qty * $query->inventory->actual_price);
        })->sum();
        TodayHistory::truncate();
    }
}
