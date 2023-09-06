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
            ['stock_transaction_id' => 1, 'product_id' => 1],
            ['stock_transaction_id' => 1, 'product_id' => 2],
            ['stock_transaction_id' => 1, 'product_id' => 3],
            ['stock_transaction_id' => 1, 'product_id' => 3],
            ['stock_transaction_id' => 1, 'product_id' => 4],
        ]);
    }
}
