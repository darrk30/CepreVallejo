<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CiclosCurso extends Model
{
    use HasFactory;

    protected $fillable = [
        'curso_id',
        'ciclo_academico_id',
        'user_id',
    ];

    // Relación con el modelo Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    // Relación con el modelo CiclosAcademico
    public function cicloAcademico()
    {
        return $this->belongsTo(CiclosAcademico::class);
    }

    // Relación con el modelo SemanasCiclo
    public function semanasCiclos()
    {
        return $this->hasMany(SemanasCiclo::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
