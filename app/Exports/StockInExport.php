<?php

namespace App\Exports;

use App\Models\StockInTransaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Request;

class StockInExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        $request = Request::all();
        return StockInTransaction::getStockIns($request);
    }

    protected $index = 0;

    public function map($stock_in): array
    {
        return [
            ++$this->index,
            $stock_in->order_number,
            $stock_in->datetime,
            $stock_in->product->name,
            $stock_in->supplier->name,
            $stock_in->quantity,
            $stock_in->price,
            $stock_in->total_price,
        ];
    }

    public function headings(): array
    {
        return [
            'No.',
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
