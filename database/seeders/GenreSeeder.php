<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Book;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->truncate();
        Genre::factory()
            ->count(8)
            ->hasBooks(3)
            ->create();
    }
}
