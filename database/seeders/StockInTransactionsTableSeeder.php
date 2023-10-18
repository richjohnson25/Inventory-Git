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
            ['supplier_id' => 1, 'product_id' => 1, 'order_number' => 'P001', 'datetime' => '2023-03-01', 'quantity' => 5, 'price' => 700000, 'value' => 3153153, 'total_price' => 3500000, 'initial_quantity' => 0, 'initial_value' => 0, 'new_quantity' => 5, 'new_value' => 3153153, 'notes' => '', 'status' => 'approved'],
            ['supplier_id' => 2, 'product_id' => 2, 'order_number' => 'P002', 'datetime' => '2023-03-03', 'quantity' => 5, 'price' => 1000000, 'value' => 4504504, 'total_price' => 5000000, 'initial_quantity' => 0, 'initial_value' => 0, 'new_quantity' => 5, 'new_value' => 4504504, 'notes' => '', 'status' => 'approved'],
            ['supplier_id' => 2, 'product_id' => 3, 'order_number' => 'P003', 'datetime' => '2023-03-04', 'quantity' => 30, 'price' => 60000, 'value' => 1621621, 'total_price' => 1800000, 'initial_quantity' => 0, 'initial_value' => 0, 'new_quantity' => 30, 'new_value' => 1621621, 'notes' => '', 'status' => 'pending'],
            ['supplier_id' => 3, 'product_id' => 4, 'order_number' => 'P004', 'datetime' => '2023-03-08', 'quantity' => 12, 'price' => 400000, 'value' => 4324324, 'total_price' => 4800000, 'initial_quantity' => 0, 'initial_value' => 0, 'new_quantity' => 12, 'new_value' => 4324324, 'notes' => '', 'status' => 'pending'],
        ]);
    }
}
