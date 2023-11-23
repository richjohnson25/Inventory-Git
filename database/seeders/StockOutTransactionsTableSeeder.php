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
            ['customer_id' => 2, 'product_id' => 3, 'order_number' => 'PS001', 'datetime' => '2023-03-05', 'quantity' => 20, 'price' => 50000, 'value' => 900900, 'total_price' => 1000000, 'initial_quantity' => 30, 'initial_value' => 1621621, 'new_quantity' => 10, 'new_value' => 720721, 'notes' => ''],
        ]);
    }
}
