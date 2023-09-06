<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    // 1 Barang hanya bisa memiliki satu kategori dan satu ukuran satuan
    // One to one
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    // 1 Barang untuk lebih dari 1 transaksi pembelian/pengeluaran barang
    // Many to one
    public function stockInTransaction() {
        return $this->hasMany(StockInTransaction::class);
    }

    public function stockOutTransaction() {
        return $this->hasMany(StockOutTransaction::class);
    }
}
