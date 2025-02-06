<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'fecha',
        'status',
        'ciclo_academico_id',
        'user_id',
    ];

    
    public function cicloAcademico()
    {
        return $this->belongsTo(CiclosAcademico::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
