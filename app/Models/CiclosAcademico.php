<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CiclosAcademico extends Model
{
    use HasFactory;

    // Definimos los campos que pueden ser llenados masivamente
    protected $fillable = [
        'titulo',
        'fecha_inicio',
        'fecha_fin',
        'slug',
        'status',
        'user_id',
    ];

    /**
     * Relación con el modelo User (un ciclo académico pertenece a un usuario)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cursos()
    {
        return $this->hasMany(CiclosCurso::class);
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'ciclo_academico_id');
    }
}
