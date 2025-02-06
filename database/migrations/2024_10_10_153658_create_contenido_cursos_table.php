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
        Schema::create('contenido_cursos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // Título del contenido
            $table->text('descripcion'); // Descripción del contenido
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade'); // Relación con el curso
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenido_cursos');
    }
};
