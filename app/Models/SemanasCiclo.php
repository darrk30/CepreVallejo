<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemanasCiclo extends Model
{
    use HasFactory;
    // Definir qué campos pueden ser llenados masivamente
    protected $fillable = ['titulo', 'ciclos_curso_id'];

    // Relación con el modelo CiclosCurso
    public function ciclosCurso()
    {
        return $this->belongsTo(CiclosCurso::class);
    }

    public function contenidosSemana()
    {
        return $this->hasMany(ContenidoSemana::class);
    }
}
