<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('goods')->insert([
            ['supplier_id' => 1, 'item_code' => 'HP001', 'item_name' => 'Vivo V27', 'item_unit' => 'pcs', 'item_current_quantity' => '5', 'item_current_value' => '04.518.042.3-042.000'],
            ['supplier_id' => 2, 'item_code' => 'HP002', 'item_name' => 'iPhone 12 Pro Max', 'item_unit' => 'pcs', 'item_current_quantity' => '5', 'item_current_value' => '04.518.042.3-042.000'],
            ['supplier_id' => 2, 'item_code' => 'CGHP001', 'item_name' => 'iPhone Charger', 'item_unit' => 'pcs', 'item_current_quantity' => '30', 'item_current_value' => '04.518.042.3-042.000'],
            ['supplier_id' => 1, 'item_code' => 'HP003', 'item_name' => 'Oppo F19', 'item_unit' => 'pcs', 'item_current_quantity' => '12', 'item_current_value' => '04.518.042.3-042.000'],
        ]);
    }
}
