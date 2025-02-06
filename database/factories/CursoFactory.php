<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Curso;
use App\Models\Category;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->bothify('CUR-###'), // Código único como CUR-001
            'nombre' => $this->faker->sentence(3), // Nombre del curso
            'descripcion' => $this->faker->paragraph(3), // Descripción del curso
            'duracion' => $this->faker->numberBetween(1, 12) . ' meses', // Duración, por ejemplo, "6 meses"
            'horario' => $this->faker->randomElement(['Lunes a Viernes', 'Fines de semana', 'Lunes y Miércoles']), // Horario del curso
            'slug' => $this->faker->slug(), // Slug basado en el nombre
            'status' => 1, // Siempre 1 (activo)
            'category_id' => Category::inRandomOrder()->first()->id ?? null, // ID de categoría, si existe            
        ];
    }
}
