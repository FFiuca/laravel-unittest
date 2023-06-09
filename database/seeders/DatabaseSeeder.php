<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Database\Seeders\RoomSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        $this->call([
            RoomSeeder::class
        ]);
        
        // \App\Models\User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('admin')
        // ]);


    }
}
