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
        $areasExperiencia = ['JavaScript', 'PHP', 'Python', 'React', 'Vue', 'Angular', 'AWS', 'Docker', 'Kubernetes'];

        $numeroAreas = $this->faker->numberBetween(1, 3);
        $areaSeleccionadas = $this->faker->randomElements($areasExperiencia, $numeroAreas);

        return [
            'nombre' => $this->faker->name(),
            'image' => $this->faker->randomElement(['ponentes/1.jpg', 'ponentes/2.jpg', 'ponentes/3.jpg', 'ponentes/4.jpg', 'ponentes/5.jpg']),
            'areas_experiencia' => $areaSeleccionadas,
            'redes_sociales' => [
                'twitter' => '@'.$this->faker->userName(),
                'linkedin' => 'https://linkedin.com/in/'.$this->faker->userName(),
                'github' => 'https://github.com/'.$this->faker->userName(),
            ],
        ];
    }
}
