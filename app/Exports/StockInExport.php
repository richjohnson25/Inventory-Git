<?php

namespace App\Exports;

use App\Models\StockInTransaction;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StockInExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $stock_in_start_date;
    protected $stock_in_end_date;

    function __construct($stock_in_start_date, $stock_in_end_date)
    {
        $this->stock_in_start_date = $stock_in_start_date;
        $this->stock_in_end_date = $stock_in_end_date;
    }

    public function query()
    {
        $stock_in_data = DB::table('stock_in_transactions')
                            ->whereBetween('datetime', [$this->stock_in_start_date, $this->stock_in_end_date])
                            ->select('order_number','datetime','product_id','supplier_id','quantity','price','total_price')
                            ->orderBy('id');

        return $stock_out_data;
    }

    public function headings(): array
    {
        return [
            'No. Pembelian',
            'Tanggal',
            'Produk',
            'Supplier',
            'Kuantitas',
            'Harga/Unit',
            'Total Harga',
        ];
    }
}
