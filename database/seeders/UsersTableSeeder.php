<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'Husnie Sukiyanto', 'username' => 'husnie71', 'phone_number' => '08118745922', 'email' => 'husnie.sukianto@gmail.com', 'address' => 'Jl. Pluit Karang Asri IV, Pluit', 'ktp' => '1671111510730001', 'npwp' => '04.518.042.3-042.001', 'password' => bcrypt('husmin71'), 'role' => 'admin'],
            ['name' => 'Rexy Hartono', 'username' => 'rexyh22', 'phone_number' => '08131660479', 'email' => 'rexy.h@gmail.com', 'address' => 'Jl. Jawa II, BSD Nusa Loka', 'ktp' => '3173013008000001', 'npwp' => '07.179.086.4-411.001', 'password' => bcrypt('rexy22'), 'role' => 'user'],
            ['name' => 'Felix Lie Pratama', 'username' => 'felixlp15', 'phone_number' => '08135288049', 'email' => 'felixlp@gmail.com', 'address' => 'Jl. Kelapa Sawit VII, Gading Serpong', 'ktp' => '3173010904000002', 'npwp' => '06.302.165.4-252.000', 'password' => bcrypt('felix15'), 'role' => 'user'],
            ['name' => 'Jonathan Surapati', 'username' => 'jojopati8', 'phone_number' => '08127579166', 'email' => 'jonathan.pati@gmail.com', 'address' => 'Jl. G. Merbabu VI, BSD Nusa Loka', 'ktp' => '3173010406000003', 'npwp' => '07.752.087.2-414.000', 'password' => bcrypt('jopati08'), 'role' => 'user'],
            ['name' => 'Audrey Palladina', 'username' => 'palladean42', 'phone_number' => '08138231674', 'email' => 'palladina@gmail.com', 'address' => 'Jl. Sutera Jelita III, Alam Sutera, Pakulonan', 'ktp' => '3674281802000001', 'npwp' => '07.215.153.4-093.000', 'password' => bcrypt('adin423'), 'role' => 'user'],
            ['name' => 'Samuel Wijaya', 'username' => 'samuel.wjy', 'phone_number' => '081619047731', 'email' => 'samuel.wjy@gmail.com', 'address' => 'Jl. Malibu Raya, Cengkareng', 'ktp' => '3173011905840004', 'npwp' => '04.855.029.1-755.001', 'password' => bcrypt('samwjy84'), 'role' => 'user'],
            ['name' => 'Christopher Deodat', 'username' => 'chris_deodat', 'phone_number' => '081322850149', 'email' => 'christopher.deodat@gmail.com', 'address' => 'Jl. Sutera Jelita III, Alam Sutera, Pakulonan', 'ktp' => '3674280811000002', 'npwp' => '07.138.086.5-474.000', 'password' => bcrypt('deodat81'), 'role' => 'user'],
        ]);
    }
}
