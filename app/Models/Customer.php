<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    // 1 Customer bisa mengajukan lebih dari 1 transaksi pengeluaran barang
    // One to many
    public function stockOutTransaction() {
        return $this->hasMany(StockOutTransaction::class);
    }
    
    protected $table = 'customers';
}
