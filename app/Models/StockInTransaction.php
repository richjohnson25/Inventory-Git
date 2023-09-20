<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockInTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'product_id',
        'order_number',
        'datetime',
        'quantity',
        'price',
        'total_price',
        'notes',
    ];

    // 1 Transaksi Pembelian Barang memiliki 1 supplier dan 1 barang
    // One to one
    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    protected $guarded = [];
}
