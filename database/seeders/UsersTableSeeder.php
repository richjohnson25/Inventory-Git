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
            ['name' => 'Husnie Sukiyanto', 'username' => 'husnie71', 'phone_number' => '08118745922', 'email' => 'husnie.sukianto@gmail.com', 'ktp' => '1671111510730001', 'npwp' => '04.518.042.3-042.000', 'password' => bcrypt('password'), 'role' => 'admin'],
            ['name' => 'Rexy Hartono', 'username' => 'rexyh22', 'phone_number' => '08131660479', 'email' => 'rexy.h@gmail.com', 'ktp' => '3173283008000001', 'npwp' => '07.179.086.4-411.001', 'password' => bcrypt('password'), 'role' => 'user'],
            ['name' => 'Felix Lie Pratama', 'username' => 'felixlp15', 'phone_number' => '08135288049', 'email' => 'felixlp@gmail.com', 'ktp' => '3173280904000002', 'npwp' => '06.302.165.4-411.002', 'password' => bcrypt('password'), 'role' => 'user'],
            ['name' => 'Jonathan Surapati', 'username' => 'jojopati8', 'phone_number' => '08127579166', 'email' => 'jonathan.pati@gmail.com', 'ktp' => '3173280406000003', 'npwp' => '07.179.086.4-411.001', 'password' => bcrypt('password'), 'role' => 'user'],
            ['name' => 'Audrey Palladina', 'username' => 'palladean42', 'phone_number' => '08138231674', 'email' => 'palladina@gmail.com', 'ktp' => '3674281802000001', 'npwp' => '07.179.086.4-411.001', 'password' => bcrypt('password'), 'role' => 'user'],
        ]);
    }
}
