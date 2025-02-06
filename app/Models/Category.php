<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function curso()
    {
        return $this->hasMany('App\Models\Curso');
    }

    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }


}
