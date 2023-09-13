<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockInTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stock_in_transactions')->insert([
            ['supplier_id' => 1, 'product_id' => 1, 'order_number' => 'P001', 'datetime' => '2023-03-01', 'quantity' => 5, 'price' => 700000, 'total_price' => 3500000, 'notes' => '', 'status' => 'Approved'],
            ['supplier_id' => 2, 'product_id' => 2, 'order_number' => 'P002', 'datetime' => '2023-03-03', 'quantity' => 5, 'price' => 1000000, 'total_price' => 5000000, 'notes' => '', 'status' => 'Approved'],
            ['supplier_id' => 2, 'product_id' => 3, 'order_number' => 'P003', 'datetime' => '2023-03-04', 'quantity' => 30, 'price' => 60000, 'total_price' => 1800000, 'notes' => '', 'status' => 'Approved'],
            ['supplier_id' => 1, 'product_id' => 4, 'order_number' => 'P004', 'datetime' => '2023-03-08', 'quantity' => 12, 'price' => 400000, 'total_price' => 4800000, 'notes' => '', 'status' => 'Approved'],
        ]);
    }
}
