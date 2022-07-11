<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\QuizSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(QuizSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
