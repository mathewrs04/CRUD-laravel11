<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            'id' => 1,
            'name' =>'Accounting',
        ]);
        DB::table('departments')->insert([
            'id' => 2,
            'name' =>'Business Development',
        ]);
        DB::table('departments')->insert([
            'id' => 3,
            'name' =>'Engineering',
        ]);
        DB::table('departments')->insert([
            'id' => 4,
            'name' =>'Human Resources',
        ]);
        DB::table('departments')->insert([
            'id' => 5,
            'name' =>'Legal',
        ]);
        DB::table('departments')->insert([
            'id' => 6,
            'name' =>'Marketing',
        ]);
        DB::table('departments')->insert([
            'id' => 7,
            'name' =>'Product Management',
        ]);
        DB::table('departments')->insert([
            'id' => 8,
            'name' =>'Sales',
        ]);
        DB::table('departments')->insert([
            'id' => 9,
            'name' =>'Training',
        ]);
    }
}
