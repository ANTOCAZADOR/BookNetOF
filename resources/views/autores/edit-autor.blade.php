<x-layout>
    <title>Editar Autor</title>

    <div class="container py-5">
        <!-- Encabezado -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Editar Autor</h1>
            <p class="text-muted fs-5">Formulario para editar los detalles del autor seleccionado.</p>
        </div>

        <!-- Formulario de edición -->
        @can('viewAdminDashboard', Auth::user())
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10"> <!-- Aumenté el tamaño de la columna -->
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Detalles del Autor</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('autor.update', $autor) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <!-- Campo Nombre -->
                            <div class="mb-4">
                                <label for="name" class="form-label">Nombre:</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') ?? $autor->name }}">
                            </div>

                            <!-- Campo Apellido -->
                            <div class="mb-4">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input type="text" name="apellido" class="form-control" value="{{ old('apellido') ?? $autor->apellido }}">
                            </div>

                            <!-- Campo Nacionalidad -->
                            <div class="mb-4">
                                <label for="nacionalidad" class="form-label">Nacionalidad:</label>
                                <input type="text" name="nacionalidad" class="form-control" value="{{ old('nacionalidad') ?? $autor->nacionalidad }}">
                            </div>

                            <!-- Botón Enviar -->
                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">Actualizar Autor</button>
                        </form>

                        <!-- Botón Cancelar -->
                        <a href="{{ route('autor.index') }}" class="btn btn-secondary btn-lg w-100">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="text-center">
                <p class="alert alert-danger">Acceso denegado.</p>
                <a href="{{ route('autor.index') }}" class="btn btn-secondary btn-lg">Aceptar</a>
            </div>
        @endcan
    </div>
</x-layout>
