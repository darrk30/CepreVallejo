<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContenidoSemana extends Model
{
    use HasFactory;


    // Definir qué campos pueden ser llenados masivamente
    protected $fillable = ['titulo', 'url', 'path', 'semanas_ciclo_id'];

    // Relación con el modelo SemanasCiclo
    public function semanaCiclo()
    {
        return $this->belongsTo(SemanasCiclo::class, 'semanas_ciclo_id');
    }
}
