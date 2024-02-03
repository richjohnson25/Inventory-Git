<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Request;

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
        'value',
        'total_price',
        'initial_quantity',
        'initial_value',
        'new_quantity',
        'new_value',
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

    protected $table = 'stock_in_transactions';

    static public function getStockIns() {
        $return = self::select('stock_in_transactions.*');

        if(!empty(Request::get('stock_in_start_date')) && !empty(Request::get('stock_in_end_date'))) {
            $return = $return->where('stock_in_transactions.datetime', '>=', Request::get('stock_in_start_date'))
                            ->where('stock_in_transactions.datetime', '<=', Request::get('stock_in_end_date'));
        }

        $return = $return->orderBy('id', 'asc')->paginate(20);

        return $return;
    }
}
