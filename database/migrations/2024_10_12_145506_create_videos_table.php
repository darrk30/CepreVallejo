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
        Schema::create('videos', function (Blueprint $table) {
            $table->id(); // ID del video
            $table->string('titulo'); // Título del video
            $table->string('status'); // Estado (publicado o borrador)
            $table->text('descripcion')->nullable(); // Descripción (puede ser nulo)
            $table->string('slug')->unique(); // Slug único para la URL
            $table->text('iframe'); // Código del iframe (para embebidos de YouTube)
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Clave foránea a 'categories'
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
