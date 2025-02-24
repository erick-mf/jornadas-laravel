<?php

namespace Database\Factories;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inscripcion>
 */
class InscripcionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'evento_id' => Evento::inRandomOrder()->first()->id,
            'tipo_inscripcion' => $this->faker->randomElement(['presencial', 'virtual']),
            'precio_pagado' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
