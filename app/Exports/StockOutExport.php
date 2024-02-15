<?php

namespace App\Exports;

use App\Models\StockOutTransaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Request;

class StockOutExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function collection()
    {
        $request = Request::all();
        return StockOutTransaction::getStockOuts($request);
    }

    protected $index = 0;

    public function map($stock_out): array
    {
        return [
            ++$this->index,
            $stock_out->order_number,
            $stock_out->datetime,
            $stock_out->product->name,
            $stock_out->customer->name,
            $stock_out->quantity,
            $stock_out->price,
            $stock_out->total_price,
        ];
    }

    public function headings(): array
    {
        return [
            'No.',
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
