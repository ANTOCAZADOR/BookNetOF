<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class LibroController extends Controller
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
        $libros = Libro::all(); 
        return view('libros.index-libro', compact('libros')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libros.create-libro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => ['required', 'max:255'],
            'autor'  => ['required', 'max:255'],
            'estatus' => 'required|string|in:disponible,noDisponible',
            'ISBN' => ['required', 'max:255'],
            'editorial' => ['required', 'max:255'],
            'fechaPublicacion' => ['required'],
        ]); 

        $libro = Libro::create($request->all());
        return redirect('/libro');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        return view('libros.show-libro', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view('libros.edit-libro', compact('libro')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $libro->update($request->all()); 
        return redirect('/libro');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect('/libro');
    }
}
