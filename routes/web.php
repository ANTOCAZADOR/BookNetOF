<?php

use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\GeneroController;

use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ReservarLibroController;

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route; 
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::resource( 'user', UserController::class)
    ->parameters(['user' => 'user'])
    ->middleware('auth');

Route::get('/landing', function () {
    return view('landing');
});

Route::resource('genero', GeneroController::class);
Route::resource('libro', LibroController::class);
//Route::post('/libro', [LibroController::class, 'store']);
Route::resource('reserva', ReservarLibroController::class);
Route::resource('prestamo', PrestamoController::class);
Route::get('/inicio', function () {
    return view('presentacion'); // Retorna la vista "resources/views/presentacion.blade.php"
});
Route::post('/reservas/cancelar/{id}', [ReservarLibroController::class, 'cancelarReserva'])->name('reserva.cancelar');

Route::resource('autor', AutorController::class); 

//Aquí esta lo relacionado con archivos: 
Route::get('/archivos', [ArchivoController::class, 'index'])->name('archivos.index');
Route::post('/archivos', [ArchivoController::class, 'store'])->name('archivos.store');
Route::get('/archivos/{archivo}', [ArchivoController::class, 'show'])->name('archivos.show');
Route::delete('/archivos/{archivo}', [ArchivoController::class, 'destroy'])->name('archivos.destroy');
Route::get('/archivos/{archivo}/edit', [ArchivoController::class, 'edit'])->name('archivos.edit');
Route::put('/archivos/{archivo}', [ArchivoController::class, 'update'])->name('archivos.update');


Route::get('/aviso-privacidad', function () {
    return view('aviso_privacidad');
})->name('aviso_privacidad');