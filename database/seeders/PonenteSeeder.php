<?php

namespace Database\Seeders;

use App\Models\Ponente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PonenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areasExperiencia = [
            'JavaScript', 'PHP', 'Python', 'React', 'Vue', 'Angular', 'AWS', 'Docker', 'Kubernetes',
        ];

        for ($i = 0; $i < 10; $i++) {
            $numAreas = rand(1, 3);
            $selectedAreas = Arr::random($areasExperiencia, $numAreas);

            Ponente::create([
                'nombre' => 'Ponente '.$i,
                'image' => 'ponentes/'.($i % 5 + 1).'.jpg',
                'areas_experiencia' => $selectedAreas,
                'redes_sociales' => [
                    'twitter' => '@ponente'.$i,
                    'linkedin' => 'https://linkedin.com/in/ponente'.$i,
                    'github' => 'https://github.com/ponente'.$i,
                ],
            ]);
        }
    }
}
