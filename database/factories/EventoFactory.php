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
        return [
            'tipo' => $this->faker->randomElement(['conferencia', 'taller']),
            'titulo' => $this->faker->sentence(),
            'lugar' => $this->faker->randomElement(['aula de taller', 'salon de actos']),
            'descripcion' => $this->faker->sentence(10),
            'dia' => $this->faker->randomElement(['jueves', 'viernes']),
            'hora_inicio' => $this->faker->time('H:i'),
            'hora_final' => $this->faker->time('H:i'),
            'cupo_maximo' => 3,
            'cupo_actual' => $this->faker->numberBetween(0, 3),
            'tipo_inscripcion' => $this->faker->randomElement(['virtual', 'presencial', 'gratuita']),
            'precio_virtual' => $this->faker->randomFloat(2, 1, 100),
            'precio_presencial' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
