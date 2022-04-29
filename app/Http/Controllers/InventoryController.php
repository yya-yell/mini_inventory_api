<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return view('Dashboard.index');
    }

    public function create()
    {
        request()->validate([
            'item_name' => ['required'],
            'price' => ['required']
        ]);
    }
}
