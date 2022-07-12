<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyInventory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }
}
