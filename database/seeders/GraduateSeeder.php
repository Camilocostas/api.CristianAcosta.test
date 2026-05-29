<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Graduate;

class GraduateSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Graduate::factory(10)->create();
    }
}

