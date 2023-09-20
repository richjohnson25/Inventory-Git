<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOutTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'product_id',
        'order_number',
        'datetime',
        'quantity',
        'price',
        'notes',
        'total_price',
    ];

    // 1 Transaksi Penjualan Barang memiliki 1 customer dan 1 barang
    // One to one
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    protected $guarded = [];
}
