<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Especifica los atributos que son asignables en masa
    protected $fillable = [
        'titulo',         // Título del libro
        'autor',
        'descripcion',
        'url',
        'status',
        'slug',
        'category_id',   // ID de la categoría (clave foránea)
    ];

    public function getRouteKeyName()
    {
        return "slug";
    }
    /**
     * Relación con la categoría.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
