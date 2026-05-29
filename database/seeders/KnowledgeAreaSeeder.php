<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\KnowledgeArea;

class KnowledgeAreaSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KnowledgeArea::factory(10)->create();
    }
}

