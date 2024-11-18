<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestamo extends Model
{
    use HasFactory;
    use SoftDeletes;  

    protected $fillable = ['id', 'fechaPrestamo', 'fechaDevolucionP', 'user_id', 'libro_id'];

    protected static function booted()
    {
        static::creating(function ($prestamo) {
            $prestamo->fechaPrestamo = now();
            $prestamo->fechaDevolucionP = now()->addDays(15);
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
