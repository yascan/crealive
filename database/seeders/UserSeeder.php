<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'superAdmin',
                'email' => 'superadmin@mail.com',
                'password' => Hash::make('123456'),
                'is_admin'=> 1
            ],
            [
                'name' => 'Author',
                'email' => 'author@mail.com',
                'password' => Hash::make('123456'),
                'is_admin'=> 1
            ],
            [
                'name' => 'Reader member',
                'email' => 'member@mail.com',
                'password' => Hash::make('123456'),
                'is_admin'=> 0
            ]
        ]);
    }
}
