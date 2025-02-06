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
        Schema::create('ciclos_academicos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // Campo para el título del ciclo académico
            $table->date('fecha_inicio'); // Campo para la fecha de inicio
            $table->date('fecha_fin'); // Campo para la fecha de finalización
            $table->string('slug')->unique(); // Campo para el slug, que será único
            $table->boolean('status')->default(true); // Campo para el estado (activo/inactivo)        
            // Clave foránea que puede ser null y se establece en null si se elimina el usuario
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciclos_academicos');
    }
};
