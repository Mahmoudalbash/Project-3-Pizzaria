<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Formats')->insert([
            [
                'size' => 'Small',
                'price' => 0.80,

            ],


            [
                'size' => 'Medium',
                'price' => 1.00,

            ],
            [
                'size' => 'large',
                'price' => 1.20,

            ],
        ]);
    }
}
