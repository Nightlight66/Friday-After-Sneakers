<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('kategori_sepatu')->insert([
            ['nama_kategori' => 'Running Shoes'],
            ['nama_kategori' => 'Basketball Shoes'],
            ['nama_kategori' => 'Casual Sneakers'],
            ['nama_kategori' => 'Skateboarding'],
        ]);

        DB::table('users')->insert([
            'nama_lengkap' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'no_telepon' => '000000000000',
            'role' => 'admin',
        ]);

    //     DB::table('users')->insert([
    //         'nama_lengkap' => 'Test User',
    //         'email' => 'usertest@example.com',
    //         'password' => Hash::make('usertest'),
    //         'no_telepon' => '123456789',
    //     ]);
     }
}
