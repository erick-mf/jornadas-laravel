<?php

namespace Database\Seeders;

use App\Models\EventoPonente;
use Illuminate\Database\Seeder;

class EventoPonenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventoPonente::factory()->count(20)->create();
    }
}
