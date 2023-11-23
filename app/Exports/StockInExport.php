<?php

namespace App\Exports;

use App\Models\StockInTransaction;
use Maatwebsite\Excel\Concerns\FromCollection;

class StockInExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StockInTransaction::all();
    }
}
