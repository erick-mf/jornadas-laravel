<?php

namespace Database\Seeders;

use App\Models\Pago;
use Illuminate\Database\Seeder;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pago::factory()->count(30)->create();
    }
}
