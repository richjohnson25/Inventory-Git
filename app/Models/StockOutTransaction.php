<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOutTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'datetime',
        'order_number',
        'customer',
        'item_name',
        'quantity',
        'price_per_unit',
        'notes',
        'total_price',
    ];
}
