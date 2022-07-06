<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Elektronik',
                'slug' => 'elektronik',
                'seo_title'=> 'Elektronik',
                'seo_description'=> 'Elektronik blog yazıları.',
            ],
            [
                'name' => 'Kitap',
                'slug' => 'kitap',
                'seo_title'=> 'Kitap',
                'seo_description'=> 'Kitap blog yazıları.',
            ],
            [
                'name' => 'Telefon',
                'slug' => 'telefon',
                'seo_title'=> 'Telefon',
                'seo_description'=> 'Telefon blog yazıları.',
            ]
        ]);
    }
}
