<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evento::factory()->count(5)->create();
    }
}
