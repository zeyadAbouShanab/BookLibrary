<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(5)->create();
        $this->call(UserSeeder::class);
         $this->call(BookSeeder::class);
         $this->call(GenreSeeder::class);
         $this->call(BorrowSeeder::class);
         
    }
}
