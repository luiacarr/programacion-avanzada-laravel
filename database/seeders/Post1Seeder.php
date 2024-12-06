<?php

namespace Database\Seeders;
use App\Models\Post1;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class Post1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Post1::factory(10)->create();  // crea 10 post de example
    }
}
