<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContenidoCurso extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descripcion', 'curso_id'];

    // Relación con el curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
