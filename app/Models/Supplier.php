<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'name',
        'phone_number',
        'address',
    ];

    // 1 Supplier bisa mengajukan lebih dari 1 transaksi pembelian barang
    // One to many
    public function stockInTransaction() {
        return $this->hasMany(StockInTransaction::class);
    }
    
    protected $table = 'suppliers';
}
