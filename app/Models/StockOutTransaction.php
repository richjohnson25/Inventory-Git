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

    // 1 Transaksi Penjualan Barang memiliki 1 customer dan 1 barang
    // One to one
    public function customer() {
        return $this->hasOne(Customer::class);
    }

    public function goods() {
        return $this->hasOne(Goods::class);
    }

    protected $guarded = [];
}
