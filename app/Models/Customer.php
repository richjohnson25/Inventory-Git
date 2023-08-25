<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // 1 Customer bisa memiliki 1 transaksi stock-out
    // Many to one
    public function stockOutTransaction() {
        return $this->belongsTo(StockOutTransaction::class);
    }
    
    protected $table = 'suppliers';
}
