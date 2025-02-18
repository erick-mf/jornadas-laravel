<?php

namespace Database\Factories;

use App\Models\Ponente;
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
            'descripcion' => $this->faker->paragraph(),
            'fecha_hora' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            'cupo_maximo' => $cupoMaximo,
            'cupo_actual' => $this->faker->numberBetween(0, $cupoMaximo),
            'ponente_id' => Ponente::factory(),
        ];
    }
}
