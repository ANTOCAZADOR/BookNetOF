<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservar_libros', function (Blueprint $table) {
            $table->id();
            $table->date('fechaReserva');
            $table->date('fechaDevolucionR');
            $table->enum('estatus', ['disponible', 'noDisponible']);
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservar_libros');
    }
};
