<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockOutTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stock_out_transactions')->insert([
            ['customer_id' => '2', 'item_id' => '3', 'order_number' => 'PS001', 'date' => '09-03-2023', 'quantity' => '20', 'price' => '50000', 'total_price' => '350000', 'notes' => '', 'status' => 'Approved'],
        ]);
    }
}
