<?php
namespace Database\Seeders;

use App\Models\AcademicTittle;
use Illuminate\Database\Seeder;

class AcademicTittleSeeder extends Seeder
{
    public function run(): void
    {
        AcademicTittle::factory(10)->create();
    }
}