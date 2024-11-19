<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <!-- Card Header -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title mb-0">Detalles del Género</h3>
                    </div>
                    <div class="card-body">
                        <!-- Genero Details -->
                        <h4 class="mb-3">{{ $genero->name }}</h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item">
                                <strong>Creado en:</strong> {{ $genero->created_at }}
                            </li>
                            <li class="list-group-item">
                                <strong>Actualizado en:</strong> {{ $genero->updated_at }}
                            </li>
                        </ul>

                        <!-- Libros asociados -->
                        <div class="mt-4">
                            <h5 class="mb-3">Libros Asociados</h5>
                            @if($genero->libros->isNotEmpty())
                                <table class="table table-striped table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>Título</th>
                                            <th>Autor</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($genero->libros as $libro)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="{{ route('libro.show', $libro->id) }}" class="text-decoration-none text-primary">
                                                        {{ $libro->titulo }}
                                                    </a>
                                                </td>
                                                <td>{{ $libro->autor }}</td>
                                                <td>
                                                    <a href="{{ route('libro.show', $libro->id) }}" class="btn btn-sm btn-info">
                                                        Ver
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-muted">No hay libros asociados a este género.</p>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('genero.edit', $genero) }}" class="btn btn-warning">
                                Editar
                            </a>
                            <form action="{{ route('genero.destroy', $genero) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este género?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Borrar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
