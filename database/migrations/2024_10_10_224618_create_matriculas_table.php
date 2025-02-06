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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique(); // Código único de la matrícula
            $table->date('fecha'); // Fecha de matrícula
            $table->string('status'); // Estado de la matrícula (1: Activo, 0: Inactivo)
            $table->foreignId('ciclo_academico_id')->constrained('ciclos_academicos'); // FK del ciclo académico
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // FK del usuario
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
