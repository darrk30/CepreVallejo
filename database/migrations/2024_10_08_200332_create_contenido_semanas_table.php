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
        Schema::create('contenido_semanas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // Título del contenido
            $table->string('path');
            $table->string('url'); // Descripción del contenido
            $table->foreignId('semanas_ciclo_id')->nullable()->constrained('semanas_ciclos')->onDelete('cascade'); // Clave foránea
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenido_semanas');
    }
};
