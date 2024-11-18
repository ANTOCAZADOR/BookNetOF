<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\User;
use App\Models\Libro;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;


class PrestamoController extends Controller
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
        $prestamos = Prestamo::with(['user', 'libro'])->get(); 
        //$prestamos2 = Prestamo::with(['libro'])->get(); 
        return view('prestamos.index-prestamo', compact('prestamos') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users= User::all(); 
        $libros = Libro::all(); 
        return view('prestamos.create-prestamo', compact('users', 'libros'));
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

        Prestamo::create($request->only(['user_id', 'libro_id']));

        return redirect()->route('prestamo.index')->with('success', 'Préstamo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestamo $prestamo)
    {
        return view('prestamos.show-prestamo', compact('prestamo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        $users= User::all(); 
        $libros = Libro::all(); 
        return view('prestamos.edit-prestamo', compact('prestamo', 'users', 'libros')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        $prestamo->update($request->all()); 
        return redirect('/prestamo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        $prestamo->delete(); 
        return redirect('/prestamo');
    }
}
