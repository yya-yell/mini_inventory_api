<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query , $filter)
    {   
        $query->when($filter['oldtest'] ?? false , function($query){
            $query->orderBy('created_at')->get();
        });

        $query->when($filter['newest'] ?? false , function($query){
            $query->latest()->get();
        });

        $query->when($filter['price'] ?? false , function($query){
            $query->orderByDesc('price')->get();
        });

        $query->when($filter['search'] ?? false , function($query , $filter){
            $query->where('item_name' , 'LIKE' , "%$filter%");
        });

        $query->when($filter['order_available'] ?? false , function($query){
            $query->where('order_available' , 'LIKE' , true);
        });

        $query->when($filter['normal_items'] ?? false , function($query){
            $query->where('order_available' , 'LIKE' , false);
        });

    }

}
