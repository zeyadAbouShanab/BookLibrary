<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => 'Jim Raynor',
            'email' => 'jim.raynor@gmail.com',
            'password' => Hash::make('12345678'),
            'is_librarian' => true,
        ]);

        User::create([
            'name' => 'Charles Dickens',
            'email' => 'char@gmail.com',
            'password' => Hash::make('12345678'),
            'is_librarian' => true,
        ]);

        User::create([
            'name' => 'Sarrah Kerrigan',
            'email' => 's.k@gmail.com',
            'password' => Hash::make('12345678'),
            'is_librarian' => false,

        ]);

        User::create([
            'name' => 'John Thomas',
            'email' => 'timmy@gmail.com',
            'password' => Hash::make('12345678'),
            'is_librarian' => false,

        ]);

    }
}
