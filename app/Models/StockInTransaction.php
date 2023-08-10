<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockInTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'stock-in_date',
        'stock-in_number',
        'supplier',
        'item_name',
        'quantity',
        'price_per_unit',
        'notes',
        'total_price',
    ];
}
