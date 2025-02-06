<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'status',
        'descripcion',
        'slug',
        'iframe',
        'category_id',
    ];

    /**
     * Relación: Un video pertenece a una categoría.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Obtener la URL completa del video basado en el slug.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
