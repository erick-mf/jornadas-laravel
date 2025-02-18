<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el usuario admin
        User::factory()->create([
            'nombre' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('1234567890'),
            'email_verified_at' => now(),
            'rol' => 'admin',
            'tipo_inscripcion' => null,
            'cuenta_confirmada' => true,
            'token_confirmacion' => null,
            'remember_token' => Str::random(10),
        ]);
        // usuarios normales
        User::factory()->count(2)->create([
            'rol' => 'normal',
            'tipo_inscripcion' => fake()->randomElement(['virtual', 'presencial', 'gratuita']),
            'cuenta_confirmada' => true,
            'token_confirmacion' => null,
        ]);

        // Crear 2 estudiantes
        User::factory()->count(2)->create([
            'rol' => 'estudiante',
            'tipo_inscripcion' => fake()->randomElement(['virtual', 'presencial', 'gratuita']),
            'cuenta_confirmada' => true,
            'token_confirmacion' => null,
        ]);
    }
}
