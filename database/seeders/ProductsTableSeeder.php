<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['supplier_id' => 1, 'category_id' => 1, 'unit_id' => 1, 'code' => 'HP001', 'name' => 'Vivo V27', 'current_quantity' => 5, 'current_value' => 3153153],
            ['supplier_id' => 2, 'category_id' => 1, 'unit_id' => 1, 'code' => 'HP002', 'name' => 'iPhone 12 Pro Max', 'current_quantity' => 5, 'current_value' => 4504504],
            ['supplier_id' => 2, 'category_id' => 2, 'unit_id' => 1, 'code' => 'CGHP001', 'name' => 'iPhone Charger', 'current_quantity' => 10, 'current_value' => 720721],
            ['supplier_id' => 3, 'category_id' => 1, 'unit_id' => 1, 'code' => 'HP003', 'name' => 'Oppo F19', 'current_quantity' => 12, 'current_value' => 4324324],
            ['supplier_id' => 1, 'category_id' => 1, 'unit_id' => 1, 'code' => 'HP004', 'name' => 'Oppo F15', 'current_quantity' => 0, 'current_value' => 0],
        ]);
    }
}
