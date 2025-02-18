<?php

use App\Models\Evento;
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
        Schema::create('evento_ponentes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Evento::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Ponente::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evento_ponentes');
    }
};
