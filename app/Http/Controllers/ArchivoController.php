<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function index()
    {
        $archivos = Archivo::all();
        return view('archivos.index', compact('archivos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file',
        ]);
    
        $archivo = $request->file('archivo');
        $ruta = $archivo->store('archivos');
        $nombreOriginal = $archivo->getClientOriginalName();
    
        Archivo::create([
            'nombre_original' => $nombreOriginal,
            'ruta' => $ruta,
        ]);
    
        return redirect()->route('archivos.index')->with('success', 'Archivo subido correctamente.');
    }

    public function show($id)
    {
        $archivo = Archivo::findOrFail($id);
        $contenido = Storage::get($archivo->ruta);
        return view('archivos.show', compact('archivo', 'contenido'));
    }

    public function destroy($archivo)
    {
        Storage::delete($archivo->ruta);
        $archivo->delete();
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
