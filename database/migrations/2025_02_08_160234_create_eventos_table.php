<?php

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
            $table->enum('lugar', ['salon de actos', 'aula de taller']);
            $table->enum('tipo_inscripcion', ['virtual', 'presencial', 'gratuita'])->default('presencial');
            $table->enum('dia', ['jueves', 'viernes']);
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->integer('cupo_maximo');
            $table->integer('cupo_actual')->default(0);
            $table->decimal('precio_presencial', 8, 2)->default(0);
            $table->decimal('precio_virtual', 8, 2)->default(0);
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
