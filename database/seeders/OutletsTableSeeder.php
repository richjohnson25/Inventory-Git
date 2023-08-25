<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('outlets')->insert([
            ['user_id' => '1', 'outlet_name' => 'PT Buana Inti Gemilang', 'outlet_phone_number' => '02153779101', 'outlet_address' => 'Jl. Pejagalan I No. 54, Jakarta Barat'],
            ['user_id' => '2', 'outlet_name' => 'ATK Electronics', 'outlet_phone_number' => '02129418656', 'outlet_address' => 'Ruko Glaze 2, Kelapa Dua'],
            ['user_id' => '3', 'outlet_name' => 'PT Maxs Digital Teknologi', 'outlet_phone_number' => '08111023313', 'outlet_address' => 'Foresta Business Loft 3, BSD'],
            ['user_id' => '4', 'outlet_name' => 'Apple Infinite', 'outlet_phone_number' => '02154210018', 'outlet_address' => 'Jl. Raya Boulevard Gading Serpong, Pakulonan'],
            ['user_id' => '5', 'outlet_name' => 'SMAK Penabur Gading Serpong', 'outlet_phone_number' => '02154205137', 'outlet_address' => 'Jl. Kelapa Gading, Gading Serpong'],
        ]);
    }
}
