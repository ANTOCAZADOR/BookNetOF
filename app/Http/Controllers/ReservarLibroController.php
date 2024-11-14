<?php

namespace App\Http\Controllers;

use App\Models\ReservarLibro;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class ReservarLibroController extends Controller
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservarLibros = ReservarLibro::all(); 
        return view('reservas.index-reservar', compact('reservarLibros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservas.create-reservar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fechaReserva' => ['required'],
            'fechaDevolucionR' => ['required'],
            'estatus' => 'required|string|in:disponible,noDisponible',
        ]); 

        $reserva = ReservarLibro::create($request->all());
        return redirect('/reserva');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReservarLibro $reservarLibro, $id)
    {
        $reservarLibro = ReservarLibro::findOrFail($id);
        return view('reservas.show-reservar', compact('reservarLibro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReservarLibro $reservarLibro, $id)
    {
        $reservarLibro = ReservarLibro::findOrFail($id);
        return view('reservas.edit-reservar', compact('reservarLibro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReservarLibro $reservarLibro)
    {
        $reservarLibro->update($request->all());
        return redirect('/reserva');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReservarLibro $reservarLibro, $id)
    {
        $reservarLibro = ReservarLibro::findOrFail($id);
        $reservarLibro->delete();
        return redirect('/reserva');
    }
}
