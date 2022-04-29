<?php

use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;


Route::get('/' , [InventoryController::class , 'index']);


Route::post('/inventory/create' , [InventoryController::class , 'create']);
