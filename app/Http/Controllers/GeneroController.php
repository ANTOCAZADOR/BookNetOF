<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class GeneroController extends Controller
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
        $generos = Genero::all();
        return view('generos.index-genero', compact('generos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('generos.create-genero');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $genero = Genero::create($request->all());
        return redirect('/genero');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genero $genero)
    {
        $genero->load('libros');
        return view('generos.show-genero', compact('genero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genero $genero)
    {
        return view('generos.edit-genero', compact('genero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genero $genero)
    {
        $genero->update($request->all());
        return redirect('/genero');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genero $genero)
    {
        $genero->delete();

        return redirect('/genero');
    }
}
