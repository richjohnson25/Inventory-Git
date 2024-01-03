<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Factory as Faker;
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
        $faker = Faker::create('id_ID');
        
        for($i = 1; $i <= 5; $i++){
            DB::table('customers')->insert([
                'code' => $faker->title,
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address
            ]);
        }
    }
}
