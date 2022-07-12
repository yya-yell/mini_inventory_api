<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\TodayHistoryController;
use App\Http\Controllers\TodayInventoryController;

Route::post('/user/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/user/auth', [AuthController::class, 'auth']);
    Route::get('/getting_inventories', [InventoryController::class, 'all']);
    Route::post('/user/logout', [AuthController::class, 'logout']);
    Route::post('/inventory/delete', [InventoryController::class, 'delete']);
    Route::put('/inventory/{inventory:id}/edit', [InventoryController::class, 'update']);
    Route::post('/inventory/create', [InventoryController::class, 'store']);
    Route::post('/todayHistory/store', [TodayHistoryController::class, 'store']);
    Route::get('/todayhistory/all', [TodayHistoryController::class, 'all']);
    Route::put('/todayhistory/edit', [TodayHistoryController::class, 'update']);
    //dashboard
    Route::middleware('auth:api')->get('/dashboard/main', [DashboardController::class, 'index']);
    //todayhistory deletes
    Route::post('/todayhistory/delete/return', [TodayHistoryController::class, 'DeleteReturn']);
    Route::post('/todayhistory/delete/waste', [TodayHistoryController::class, 'WasteReturn']);
    //records
    Route::get('/records/daily', [RecordsController::class, 'daily_records']);
    Route::get('/records/test', [RecordsController::class, 'test']);
    //today inventory list
    Route::get('/inventory/today', [TodayInventoryController::class, 'index']);
});
