<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model
{
    use HasFactory;
    use SoftDeletes; 

    protected $fillable = ['id', 'titulo', 'autor', 'estatus', 'ISBN', 'editorial', 'fechaPublicacion'];

    public function generos()
    {
        return $this->belongsToMany(Genero::class, 'libro_genero', 'libro_id', 'genero_id');
    }


}
