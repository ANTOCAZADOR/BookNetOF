<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
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
        $prestamos = Prestamo::all(); 
        return view('prestamos.index-prestamo', compact('prestamos') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prestamos.create-prestamo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fechaPrestamo' => ['required'],
            'fechaDevolucionP' => ['required'],
        ]); 

        $prestamo = Prestamo::create($request->all());
        return redirect('/prestamo'); 
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
        return view('prestamos.edit-prestamo', compact('prestamo')); 
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
