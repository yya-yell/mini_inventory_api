<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\TodayHistoryController;
use Illuminate\Support\Facades\Route;


Route::get('/test' , [InventoryController::class , 'test']);

