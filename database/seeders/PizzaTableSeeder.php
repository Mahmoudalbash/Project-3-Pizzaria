<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pizza')->insert
        ([
                'name' => 'Margherita',
            ],
            [
                'name' => 'Capricciosa',
            ],
            [
                'name' => 'Veggie',
            ],
        );
    }
}
