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
            ['supplier_id' => '1', 'item_id' => '1', 'order_number' => 'P001', 'date' => '01-03-2023', 'quantity' => '5', 'price' => '700000', 'total_price' => '3500000', 'notes' => '', 'status' => 'Approved'],
            ['supplier_id' => '2', 'item_id' => '2', 'order_number' => 'P002', 'date' => '03-03-2023', 'quantity' => '5', 'price' => '1000000', 'total_price' => '5000000', 'notes' => '', 'status' => 'Approved'],
            ['supplier_id' => '2', 'item_id' => '3', 'order_number' => 'P003', 'date' => '04-03-2023', 'quantity' => '30', 'price' => '60000', 'total_price' => '1800000', 'notes' => '', 'status' => 'Approved'],
            ['supplier_id' => '1', 'item_id' => '4', 'order_number' => 'P004', 'date' => '08-03-2023', 'quantity' => '12', 'price' => '400000', 'total_price' => '4800000', 'notes' => '', 'status' => 'Approved'],
        ]);
    }
}
