<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\ReservarLibro;
use App\Models\User;
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
        $reservarLibros = ReservarLibro::with(['user', 'libro'])->get(); 
        //$reservarLibros2 = ReservarLibro::with(['libros'])->get(); 
        return view('reservas.index-reservar', compact('reservarLibros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users= User::all(); 
        $libros = Libro::all(); 
        return view('reservas.create-reservar', compact('users', 'libros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'libro_id' => 'required|exists:libros,id',
        ]); 

        ReservarLibro::create($request->only(['user_id', 'libro_id']));

        return redirect()->route('reserva.index')->with('success', 'Reserva creada exitosamente.');
        
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
        $users= User::all(); 
        $libros = Libro::all(); 
        $reservarLibro = ReservarLibro::findOrFail($id);
        return view('reservas.edit-reservar', compact('reservarLibro', 'users'. 'libros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReservarLibro $reservarLibro, $id)
    {
        $reservarLibro = ReservarLibro::findOrFail($id);
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
