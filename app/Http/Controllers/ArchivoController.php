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

    public function destroy($id)
    {
        $archivo = Archivo::findOrFail($id);
        Storage::delete($archivo->ruta);
        $archivo->delete();
        return redirect()->route('archivos.index')->with('success', 'Archivo eliminado correctamente.');
    }

    public function edit($id)
    {
        $archivo = Archivo::findOrFail($id);
        $contenido = Storage::get($archivo->ruta); // Usamos $archivo->ruta correctamente
        return view('archivos.edit', compact('archivo', 'contenido'));
    }    

    public function update(Request $request, $id)
    {
        $request->validate([
            'contenido' => 'required|string',
        ]);

        $archivo = Archivo::findOrFail($id);

        // Sobreescribe el contenido del archivo
        Storage::put($archivo->ruta, $request->contenido);

        return redirect()->route('archivos.index')->with('success', 'Archivo actualizado correctamente.');
    }

}
