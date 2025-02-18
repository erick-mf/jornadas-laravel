<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ponente>
 */
class PonenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'image' => $this->faker->randomElement(['ponentes/1.jpg', 'ponentes/2.jpg', 'ponentes/3.jpg', 'ponentes/4.jpg', 'ponentes/5.jpg']),
            'areas_experiencia' => $this->faker->randomElement(['JavaScript', 'PHP', 'Python']).', '.
                                 $this->faker->randomElement(['React', 'Vue', 'Angular']).', '.
                                 $this->faker->randomElement(['AWS', 'Docker', 'Kubernetes']),
            'redes_sociales' => json_encode([
                'twitter' => '@'.$this->faker->userName(),
                'linkedin' => 'https://linkedin.com/in/'.$this->faker->userName(),
                'github' => 'https://github.com/'.$this->faker->userName(),
            ]),
        ];
    }
}
