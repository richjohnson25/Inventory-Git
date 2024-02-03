<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Request;

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
        'value',
        'total_price',
        'initial_quantity',
        'initial_value',
        'new_quantity',
        'new_value',
        'notes',
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

    protected $table = 'stock_out_transactions';

    static public function getStockOuts() {
        $return = self::select('stock_out_transactions.*');

        if(!empty(Request::get('stock_out_start_date')) && !empty(Request::get('stock_out_start_date'))) {
            $return = $return->where('stock_out_transactions.datetime', '>=', Request::get('stock_out_start_date'))
                            ->where('stock_out_transactions.datetime', '<=', Request::get('stock_out_end_date'));
        }

        $return = $return->orderBy('id', 'asc')->paginate(20);

        return $return;
    }
}
