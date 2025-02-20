<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pago>
 */
class PagoFactory extends Factory
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
            'monto' => $this->faker->randomFloat(2, 10, 100),
            'estado' => $this->faker->randomElement(['pendiente', 'completado', 'fallido']),
            'paypal_transaccion_id' => $this->faker->uuid,
        ];
    }
}
