<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'name' => 'Pizza Margherita',

                'price' => 15.00,

            ],
            [
                'name' => 'Pizza Pollo',

                'price' => 20.00,
            ],


        ]);
    }
}
