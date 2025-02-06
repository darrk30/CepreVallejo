<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'create_at', 'update_at'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function ciclos()
    {
        return $this->hasMany(CiclosCurso::class);
    }

    public function contenidosCurso()
    {
        return $this->hasMany(ContenidoCurso::class);
    }
}
