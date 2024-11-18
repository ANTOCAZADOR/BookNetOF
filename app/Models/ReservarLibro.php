<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReservarLibro extends Model
{
    use HasFactory;
    use SoftDeletes; 

    protected $fillable = ['id', 'fechaReserva', 'fechaDevolucionR', 'estatus', 'user_id', 'libro_id'];

    protected static function booted()
    {
        static::creating(function ($reservarLibro) {
            $reservarLibro->fechaReserva = now();
            $reservarLibro->fechaDevolucionR = now()->addDays(2);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }

}
