<?php

namespace App\Exports;

use App\Models\StockOutTransaction;
use Maatwebsite\Excel\Concerns\FromCollection;

class StockOutExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StockOutTransaction::all();
    }
}
