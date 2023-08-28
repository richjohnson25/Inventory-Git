<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            ['user_id' => 3, 'customer_code' => 'CUS001'],
            ['user_id' => 5, 'customer_code' => 'CUS002'],
        ]);
    }
}
