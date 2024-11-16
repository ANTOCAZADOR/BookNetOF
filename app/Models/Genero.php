<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $fillable = [
        'name',
    ];

    public function libros()
    {
        return $this->belongsToMany(Libro::class, 'libro_genero', 'genero_id', 'libro_id');
    }

}
