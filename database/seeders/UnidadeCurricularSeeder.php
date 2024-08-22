<?php

namespace Database\Seeders;

use App\Models\UnidadeCurricular;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadeCurricularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnidadeCurricular::factory(10)->create();
    }
}
