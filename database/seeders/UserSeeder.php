<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email'=> 'admin@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'admin',
                'number_phone' => '0982382014'
            ],
            [
                'name' => 'customer',
                'email'=> 'customer@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'customer',
                'number_phone' => '0982382012'
            ],
            [
                'name' => 'company',
                'email'=> 'company@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'company',
                'number_phone' => '0982382013'
            ]
        ]);
    }
}
