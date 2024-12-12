<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Alexis',
            'email' => 'alexis@example.com',
            'password' => bcrypt('12345678'),
        ]);
        User::factory()->create([
            'name' => 'Wilson',
            'email' => 'wilson@example.com',
            'password' => bcrypt('12345678'),
        ]);
        User::factory()->create([
            'name' => 'Gabriel',
            'email' => 'gabriel@example.com',
            'password' => bcrypt('12345678'),
        ]);
        User::factory()->create([
            'name' => 'Gustavo',
            'email' => 'gustavo@example.com',
            'password' => bcrypt('12345678'),
        ]);
        User::factory()->create([
            'name' => 'Juan',
            'email' => 'juan@example.com',
            'password' => bcrypt('12345678'),
        ]);
        User::factory()->create([
            'name' => 'Luis',
            'email' => 'luis@example.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
