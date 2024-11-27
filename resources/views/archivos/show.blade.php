<x-layout>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4 text-gray-800">Contenido del Archivo</h1>

            <div class="card">
                <div class="card-header">
                    <h5>{{ $archivo->nombre_original }}</h5>
                </div>
                <div class="card-body">
                    <pre class="bg-light p-3">{{ $contenido }}</pre>
                    <a href="{{ route('archivos.index') }}" class="btn btn-primary mt-3">Volver a la lista</a>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>
