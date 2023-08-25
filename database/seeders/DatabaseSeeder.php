<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(OutletsTableSeeder::class);
        $this->call(GoodsTableSeeder::class);
        $this->call(StockInTransactionTableSeeder::class);
        $this->call(StockOutTransactionTableSeeder::class);
    }
}
