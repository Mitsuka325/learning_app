<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            'grade' => '小学１年生',
        ]);
        DB::table('classes')->insert([
            'grade' => '小学２年生',
        ]);
        DB::table('classes')->insert([
            'grade' => '小学３年生',
        ]);
        DB::table('classes')->insert([
            'grade' => '小学４年生',
        ]);
        DB::table('classes')->insert([
            'grade' => '小学５年生',
        ]);
        DB::table('classes')->insert([
            'grade' => '小学６年生',
        ]);
        DB::table('classes')->insert([
            'grade' => '中学１年生',
        ]);
        DB::table('classes')->insert([
            'grade' => '中学２年生',
        ]);
        DB::table('classes')->insert([
            'grade' => '中学３年生',
        ]);
        DB::table('classes')->insert([
            'grade' => '高校１年生',
        ]);
        DB::table('classes')->insert([
            'grade' => '高校２年生',
        ]);
        DB::table('classes')->insert([
            'grade' => '高校３年生',
        ]);
        
        

    }
}
