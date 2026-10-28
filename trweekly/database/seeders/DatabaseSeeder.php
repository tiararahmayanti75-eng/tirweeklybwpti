<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Membuat 5 berita dummy otomatis menggunakan Factory
        Berita::factory(5)->create();

        //DB::table('users')->insert([
        //    'name' => "Tiara",
        //    'email' => 'tiararahmayanti75@example.com',
        //    'password' => Hash::make('password'),
        //]);

    }
}