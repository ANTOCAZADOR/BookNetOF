<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Genero; 
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
        $libros = Libro::with(['generos'])->get(); 
        return view('libros.index-libro', compact('libros')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = Genero::all(); // Obtiene todos los géneros
        return view('libros.create-libro', compact('generos'));
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
            'generos' => 'array', // Validar como un arreglo
            'generos.*' => 'exists:generos,id', // Cada ID debe existir en la tabla géneros
        ]); 

        $libro = Libro::create($request->all());

        $libro->generos()->attach($request->generos);
        return redirect()->route('libro.index')->with('success', 'Libro creado correctamente.');
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
        $generos = Genero::all(); 
        return view('libros.edit-libro', compact('libro', 'generos')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'estatus' => 'required|string',
            'ISBN' => 'required|string|max:13',
            'editorial' => 'required|string|max:255',
            'fechaPublicacion' => 'required|date',
            'generos' => 'array', // Validar como un arreglo
            'generos.*' => 'exists:generos,id', // Cada ID debe existir en la tabla géneros
        ]);
    
        // Actualiza el libro
        $libro->update([
            'titulo' => $validatedData['titulo'],
            'autor' => $validatedData['autor'],
            'estatus' => $validatedData['estatus'],
            'isbn' => $validatedData['ISBN'],
            'editorial' => $validatedData['editorial'],
            'fechaPublicacion' => $validatedData['fechaPublicacion'],
        ]);
    
        // Sincroniza los géneros seleccionados
        $libro->generos()->sync($validatedData['generos'] ?? []);
    
        return redirect()->route('libro.index')->with('success', 'Libro actualizado correctamente.');
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
