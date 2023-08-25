<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    // 1 Supplier bisa bertanggung jawab pada 1 transaksi stock-in
    // Many to one
    public function stockInTransaction() {
        return $this->belongsTo(StockInTransaction::class);
    }
    
    protected $table = 'suppliers';
}
