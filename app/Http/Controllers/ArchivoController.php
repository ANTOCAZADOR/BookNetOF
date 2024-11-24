<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function index()
    {
        $archivos = Storage::files('archivos'); // Carpeta 'archivos'
        return view('archivos.index', compact('archivos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|max:10240', // Máximo 10 MB
        ]);

        $path = $request->file('archivo')->store('archivos');

        return redirect()->route('archivos.index')->with('success', 'Archivo cargado correctamente.');
    }

    public function show($archivo)
    {
        $contenido = Storage::get("archivos/{$archivo}");

        return view('archivos.show', compact('archivo', 'contenido'));
    }

    public function destroy($archivo)
    {
        Storage::delete("archivos/{$archivo}");
        return redirect()->route('archivos.index')->with('success', 'Archivo eliminado correctamente.');
    }

    public function edit($archivo)
    {
        $contenido = Storage::get("archivos/{$archivo}");
        return view('archivos.edit', compact('archivo', 'contenido'));
    }

    public function update(Request $request, $archivo)
    {
        $request->validate([
            'contenido' => 'required|string',
        ]);

        Storage::put("archivos/{$archivo}", $request->contenido);
        return redirect()->route('archivos.index')->with('success', 'Archivo actualizado correctamente.');
    }
}
