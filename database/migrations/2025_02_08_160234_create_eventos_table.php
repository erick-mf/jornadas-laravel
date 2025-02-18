<?php

use App\Models\Ponente;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['conferencia', 'taller']);
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->dateTime('fecha_hora');
            $table->integer('cupo_maximo');
            $table->integer('cupo_actual')->default(0);
            $table->foreignIdFor(Ponente::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
