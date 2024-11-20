<x-layout>
    <title>Detalles del Libro</title>

    <div class="container py-5">
        <!-- Encabezado -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Detalles del Libro</h1>
            <p class="text-muted fs-5">Información detallada del libro seleccionado.</p>
        </div>

        <!-- Tarjeta de detalles -->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>{{ $libro->titulo }}</h4>
                    </div>
                    <div class="card-body">
                        <!-- Detalles del Libro -->
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item">
                                <strong>Autor:</strong> {{ $libro->autor }}
                            </li>
                            <li class="list-group-item">
                                <strong>Estatus:</strong>
                                <span class="badge bg-{{ $libro->estatus == 'disponible' ? 'success' : 'danger' }}">
                                    {{ ucfirst($libro->estatus) }}
                                </span>
                            </li>
                            <li class="list-group-item">
                                <strong>ISBN:</strong> {{ $libro->ISBN }}
                            </li>
                            <li class="list-group-item">
                                <strong>Editorial:</strong> {{ $libro->editorial }}
                            </li>
                            <li class="list-group-item">
                                <strong>Fecha de Publicación:</strong> {{ $libro->fechaPublicacion }}
                            </li>
                            <li class="list-group-item">
                                <strong>Fecha de Creación:</strong> {{ $libro->created_at->format('d-m-Y H:i') }}
                            </li>
                            <li class="list-group-item">
                                <strong>Última Actualización:</strong> {{ $libro->updated_at->format('d-m-Y H:i') }}
                            </li>
                            <li class="list-group-item">
                                <strong>Géneros:</strong>
                                <ul>
                                    @foreach ($libro->generos as $genero)
                                        <li>{{ $genero->name }}</li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>

                        <!-- Botones de acción -->
                        <div class="d-flex justify-content-between">
                            <!-- Botón Editar -->
                            <a href="{{ route('libro.edit', $libro) }}" class="btn btn-warning btn-lg">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('libro.destroy', $libro) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg">
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
            <a href="/libro" class="btn btn-secondary btn-lg">
                <i class="fas fa-arrow-left"></i> Regresar a la lista de libros
            </a>
        </div>
    </div>
</x-layout>
