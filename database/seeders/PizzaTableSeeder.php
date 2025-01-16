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
        DB::table('pizzas')->insert([
            [
                'name' => 'Margherita',
                'image' => 'margherita.jpg',
                'description' => 'lwsswsw',
                'price' => 8.00,

            ],
            [
                'name' => 'Capricciosa',
                'description' => 'ssjjs',
                'image' => 'capricciosa.jpg',
                'price' => 10.50,
            ],
            [
                'name' => 'Veggie',
                'image' => 'veggie.jpg',
                'description' => 'lsswsw',
                'price' => 9.00,
            ],
            [
                'name' => 'Quattro Formaggi',
                'image' => 'quattro_formaggi.jpg',
                'description' => 'lmmmwsw',
                'price' => 11.00,
            ],
        ]);
    }
}
