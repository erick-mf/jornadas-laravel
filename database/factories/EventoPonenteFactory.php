<?php

namespace Database\Factories;

use App\Models\Evento;
use App\Models\Ponente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventoPonente>
 */
class EventoPonenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'evento_id' => Evento::inRandomOrder()->first()->id,
            'ponente_id' => Ponente::inRandomOrder()->first()->id,
        ];
    }
}
