<x-layout>
    <title>Detalles de Autor</title>

    <div class="container py-5">
        <!-- Encabezado -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">{{ $autor->name }}</h1>
            <p class="text-muted fs-5">Información detallada del autor seleccionado.</p>
        </div>

        <!-- Detalles del Autor -->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Detalles de Autor</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item">
                                <strong>Apellido:</strong> {{ $autor->apellido }}
                            </li>
                            <li class="list-group-item">
                                <strong>Nacionalidad:</strong> {{ $autor->nacionalidad }}
                            </li>
                            <li class="list-group-item">
                                <strong>Fecha de Creación:</strong> {{ $autor->created_at->format('d-m-Y H:i') }}
                            </li>
                            <li class="list-group-item">
                                <strong>Última Actualización:</strong> {{ $autor->updated_at->format('d-m-Y H:i') }}
                            </li>
                        </ul>

                        <!-- Botones de acción -->
                        <div class="d-flex justify-content-between">
                            <!-- Botón Editar -->
                            <a href="{{ route('autor.edit', $autor) }}" class="btn btn-warning btn-lg w-48">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('autor.destroy', $autor) }}" method="POST" class="d-inline-block w-48">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg w-100">
                                    <i class="fas fa-trash"></i> Borrar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enlace de regreso -->
        <div class="text-center mt-5">
            <a href="{{ route('autor.index') }}" class="btn btn-secondary btn-lg">
                <i class="fas fa-arrow-left"></i> Regresar a la lista de autores
            </a>
        </div>
    </div>
</x-layout>
