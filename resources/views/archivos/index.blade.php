<x-layout>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4 text-gray-800">Avisos</h1>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Formulario para cargar archivos -->
            @can('viewAdminDashboard', Auth::user())
            <h2>Gestión de archivos</h2>
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Cargar Nuevo Archivo</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="archivo">Selecciona un archivo:</label>
                            <input type="file" class="form-control" name="archivo" id="archivo" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Subir archivo</button>
                    </form>
                </div>
            </div>
            @endcan

            <!-- Lista de Archivos -->
            <div class="card">
                <div class="card-header">
                    <h5>Listado de avisos</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($archivos as $archivo)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="{{ route('archivos.show', basename($archivo)) }}" class="text-decoration-none">{{ basename($archivo) }}</a>
                                @can('viewAdminDashboard', Auth::user())
                                <div>
                                    <a href="{{ route('archivos.edit', basename($archivo)) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('archivos.destroy', basename($archivo)) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este archivo?')">Eliminar</button>
                                    </form>
                                </div>
                                @endcan
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>