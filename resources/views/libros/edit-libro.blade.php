<x-layout>
    <title>Editar Libro</title>

    <div class="container py-5">
        <!-- Encabezado -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Editar Libro</h1>
            <p class="text-muted fs-5">Actualiza la información del libro seleccionado.</p>
        </div>

        <!-- Formulario de edición -->
        @can('viewAdminDashboard', Auth::user())
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>{{ $libro->titulo }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('libro.update', $libro) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <!-- Título -->
                            <div class="mb-4">
                                <label for="titulo" class="form-label">Título:</label>
                                <input type="text" name="titulo" class="form-control" value="{{ old('titulo') ?? $libro->titulo }}">
                            </div>

                            <!-- Autor -->
                            <div class="mb-4">
                                <label for="autor" class="form-label">Autor:</label>
                                <input type="text" name="autor" class="form-control" value="{{ old('autor') ?? $libro->autor }}">
                            </div>

                            <!-- Estatus -->
                            <div class="mb-4">
                                <label for="estatus" class="form-label">Estatus:</label>
                                <select id="estatus" name="estatus" class="form-select">
                                    <option value="disponible" {{ (old('estatus') ?? $libro->estatus) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                                    <option value="noDisponible" {{ (old('estatus') ?? $libro->estatus) == 'noDisponible' ? 'selected' : '' }}>No Disponible</option>
                                </select>
                            </div>

                            <!-- ISBN -->
                            <div class="mb-4">
                                <label for="ISBN" class="form-label">ISBN:</label>
                                <input type="text" name="ISBN" class="form-control" value="{{ old('ISBN') ?? $libro->ISBN }}">
                            </div>

                            <!-- Editorial -->
                            <div class="mb-4">
                                <label for="editorial" class="form-label">Editorial:</label>
                                <input type="text" name="editorial" class="form-control" value="{{ old('editorial') ?? $libro->editorial }}">
                            </div>

                            <!-- Fecha de Publicación -->
                            <div class="mb-4">
                                <label for="fechaPublicacion" class="form-label">Fecha de Publicación:</label>
                                <input type="date" name="fechaPublicacion" class="form-control" value="{{ old('fechaPublicacion') ?? $libro->fechaPublicacion }}">
                            </div>

                            <!-- Géneros -->
                            <div class="mb-4">
                                <label for="generos" class="form-label">Géneros:</label>
                                <select id="generos" name="generos[]" class="form-select" multiple>
                                    @foreach($generos as $genero)
                                        <option value="{{ $genero->id }}" 
                                            {{ in_array($genero->id, $libro->generos->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $genero->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Botón de Enviar -->
                            <div class="text-center">
                                <a href="/libro" class="btn btn-secondary btn-lg px-5">
                                    <i class="fas fa-arrow-left"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="text-center">
                <p class="alert alert-danger">Acceso denegado.</p>
                <a href="/user" class="btn btn-secondary btn-lg">Aceptar</a>
            </div>
        @endcan
    </div>
</x-layout>
