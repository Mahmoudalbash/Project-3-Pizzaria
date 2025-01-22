<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


        public function run(): void
    {
        DB::table('employees')->insert([
            [
                'name' => 'mahmoud',
                'email' => 'mahmoud@example.com',


            ],
            [
                'name' => 'khalil',
                'email' => 'khalil@example.com',


            ],


        ]);
    }

}
