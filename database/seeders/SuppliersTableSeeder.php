<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            ['user_id' => 2, 'supplier_code' => 'SUP001'],
            ['user_id' => 4, 'supplier_code' => 'SUP002'],
        ]);
    }
}
