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
        Schema::create('ciclos_cursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade'); // Relación con la tabla cursos
            $table->foreignId('ciclo_academico_id')->constrained('ciclos_academicos')->onDelete('cascade'); // Relación con la tabla ciclos_academicos
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciclos_cursos');
    }
};
