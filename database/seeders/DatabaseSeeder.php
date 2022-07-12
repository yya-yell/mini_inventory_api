<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Inventory;
use App\Models\SupplyDemandCalculation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Inventory::factory(100)->create();
        User::create([
            'name' => 'admin' ,
            'email' => 'admin@gmail.com' , 
            'password' => bcrypt('password')
        ]);
        SupplyDemandCalculation::create([
            'supply' => 0,
            'demand' => 0
        ]);
    }
}
