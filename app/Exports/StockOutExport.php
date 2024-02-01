<?php

namespace App\Exports;

use App\Models\StockOutTransaction;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StockOutExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $stock_out_start_date;
    protected $stock_out_end_date;

    function __construct($stock_out_start_date, $stock_out_end_date)
    {
        $this->stock_out_start_date = $stock_out_start_date;
        $this->stock_out_end_date = $stock_out_end_date;
    }

    public function query()
    {
        $stock_out_data = DB::table('stock_out_transactions')
                            ->whereBetween('datetime', [$this->stock_out_start_date, $this->stock_out_end_date])
                            ->select('order_number','datetime','product_id','customer_id','quantity','price','total_price')
                            ->orderBy('id');

        return $stock_out_data;
    }

    public function headings(): array
    {
        return [
            'No. Penjualan',
            'Tanggal',
            'Produk',
            'Customer',
            'Kuantitas',
            'Harga/Unit',
            'Total Harga',
        ];
    }
}
