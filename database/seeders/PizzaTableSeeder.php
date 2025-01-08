<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pizza')->insert([
            [
                'name' => 'Margherita',
                'image' => 'margherita.jpg',
                'price' => 8.00,
            ],
            [
                'name' => 'Capricciosa',
                'image' => 'capricciosa.jpg',
                'price' => 10.50,
            ],
            [
                'name' => 'Veggie',
                'image' => 'veggie.jpg',
                'price' => 9.00,
            ],
            [
                'name' => 'Quattro Formaggi',
                'image' => 'quattro_formaggi.jpg',
                'price' => 11.00,
            ],
        ]);
    }
}
