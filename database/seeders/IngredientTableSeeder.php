<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredients')->insert([
            [
                'name' => 'onion',
                'price' => 00.50,
            ],
            [
                'name' => 'tomato sauce',
                'price' => 00.60,
            ],
            [
                'name' => 'cheese',
                'price' => 00.30,
            ],
            [
                'name' => 'olives',
                'price' => 00.75,
            ],
            [
                'name' => 'mushrooms',
                'price' => 00.80,
            ],
            [
                'name' => 'pepperoni',
                'price' => 00.40,
            ],
            [
                'name' => 'bacon',
                'price' => 00.30,
            ],
            [
                'name' => 'pork chop',
                'price' => 00.50,
            ],
        ]);
    }
}
