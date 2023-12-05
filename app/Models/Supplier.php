<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    protected $fillable = [
        'user_id',
        'supplier_code',
    ];

    // One to one
    public function user() {
        return $this->belongsTo(User::class);
    }

    // 1 Supplier bisa mengajukan lebih dari 1 transaksi pembelian barang
    // One to many
    public function stockInTransaction() {
        return $this->hasMany(StockInTransaction::class);
    }
    
    protected $table = 'suppliers';
}
