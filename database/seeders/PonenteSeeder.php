<?php

namespace Database\Seeders;

use App\Models\Ponente;
use Illuminate\Database\Seeder;

class PonenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ponente::factory()->count(5)->create();
    }
}
