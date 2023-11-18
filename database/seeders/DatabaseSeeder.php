<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Grade::create(['grade_name' => '小学1年生']);
        Grade::create(['grade_name' => '小学2年生']);
        Grade::create(['grade_name' => '小学3年生']);
        Grade::create(['grade_name' => '小学4年生']);
        Grade::create(['grade_name' => '小学5年生']);
        Grade::create(['grade_name' => '小学6年生']);
        Grade::create(['grade_name' => '中学1年生']);
        Grade::create(['grade_name' => '中学2年生']);
        Grade::create(['grade_name' => '中学3年生']);
        Grade::create(['grade_name' => '高校1年生']);
        Grade::create(['grade_name' => '高校2年生']);
        Grade::create(['grade_name' => '高校3年生']);
    }
}
