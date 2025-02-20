<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cupoMaximo = $this->faker->numberBetween(20, 50);

        return [
            'tipo' => $this->faker->randomElement(['conferencia', 'taller']),
            'titulo' => $this->faker->sentence(),
            'descripcion' => $this->faker->sentence(10),
            'fecha_hora' => $this->faker->dateTimeBetween('now', '+1 weeks')->format('Y-m-d H:i'),
            'cupo_maximo' => $cupoMaximo,
            'cupo_actual' => $this->faker->numberBetween(0, $cupoMaximo),
        ];
    }
}
