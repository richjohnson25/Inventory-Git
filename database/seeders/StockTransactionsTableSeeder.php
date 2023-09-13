<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stock_transactions')->insert([
            ['stock_transaction_id' => 1, 'product_id' => 1, 'initial_quantity' => 0, 'initial_value' => 0, 'stock-in_quantity' => 0, 'stock-in_value' => 0, 'stock-out_quantity' => 0, 'stock-out_value' => 0, 'other_quantity' => 0, 'other_value' => 0, 'current_quantity' => 0, 'vurrent_value' => 0],
            ['stock_transaction_id' => 1, 'product_id' => 2, 'initial_quantity' => 0, 'initial_value' => 0, 'stock-in_qunatity' => 0, 'stock-in_value' => 0, 'stock-out_quantity' => 0, 'stock-out_value' => 0, 'other_quantity' => 0, 'other_value' => 0, 'current_quantity' => 0, 'vurrent_value' => 0],
            ['stock_transaction_id' => 1, 'product_id' => 3, 'initial_quantity' => 0, 'initial_value' => 0, 'stock-in_quantity' => 0, 'stock-in_value' => 0, 'stock-out_quantity' => 0, 'stock-out_value' => 0, 'other_quantity' => 0, 'other_value' => 0, 'current_quantity' => 0, 'vurrent_value' => 0],
            ['stock_transaction_id' => 1, 'product_id' => 3, 'initial_quantity' => 0, 'initial_value' => 0, 'stock-in_quantity' => 0, 'stock-in_value' => 0, 'stock-out_quantity' => 0, 'stock-out_value' => 0, 'other_quantity' => 0, 'other_value' => 0, 'current_quantity' => 0, 'vurrent_value' => 0],
            ['stock_transaction_id' => 1, 'product_id' => 4, 'initial_quantity' => 0, 'initial_value' => 0, 'stock-in_quantity' => 0, 'stock-in_value' => 0, 'stock-out_quantity' => 0, 'stock-out_value' => 0, 'other_quantity' => 0, 'other_value' => 0, 'current_quantity' => 0, 'vurrent_value' => 0],
        ]);
    }
}
