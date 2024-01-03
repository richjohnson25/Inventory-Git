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
            ['code' => 'SUP001', 'name' => 'PT. Vivo Mobile Indonesia', 'phone_number' => '02129005635', 'address' => 'Jl. Bhumimas VIII No.10 A-D, Talaga, Kec. Cikupa, Kab. Tangerang, Banten'],
            ['code' => 'SUP002', 'name' => 'PT. Apple Indonesia', 'phone_number' => '08001027753', 'address' => 'World Trade Center II, Jl. Jenderal Sudirman No.8 8, RT.8/RW.3, Kuningan, Karet, Kec. Setiabudi, Jakarta Selatan, DKI Jakarta'],
            ['code' => 'SUP003', 'name' => 'OPPO Manufacturing Indonesia', 'phone_number' => '02129662888', 'address' => 'RJP8+FJ Pabuaran Tumpeng, Kota Tangerang, Banten'],
            ['code' => 'SUP004', 'name' => 'PT. Samsung Electronics Indonesia', 'phone_number' => '02189837114', 'address' => 'Jl. Jababeka Raya Blok F. 29 No.31, Harja Mekar, Kec. Cikarang Utara, Kabupaten Bekasi, Jawa Barat'],
            ['code' => 'SUP005', 'name' => 'PT. Panggung Electric Citrabuana', 'phone_number' => '0216514311', 'address' => 'Wisma Megah Lt. 2, Suite 201-203, Jl. Danau Sunter Utara, Blok N2 No. 2-3, RT.10/RW.11, Sunter Jaya, Kec. Tj. Priok, Jakarta Utara, DKI Jakarta'],
        ]);
    }
}
