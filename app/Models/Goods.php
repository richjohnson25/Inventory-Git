<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    // 1 Barang untuk lebih dari 1 transaksi pengeluaran barang
    // Many to one
    public function stockOutTransaction() {
        return $this->hasMany(StockOutTransaction::class);
    }

    protected $table = 'customers';
}
