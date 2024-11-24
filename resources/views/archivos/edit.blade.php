<x-layout>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4 text-gray-800">Editar Archivo: {{ $archivo }}</h1>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h5>Modificar Contenido</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('archivos.update', $archivo) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="contenido">Contenido del Archivo:</label>
                            <textarea class="form-control" name="contenido" id="contenido" rows="10" required>{{ $contenido }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Actualizar</button>
                        <a href="{{ route('archivos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>