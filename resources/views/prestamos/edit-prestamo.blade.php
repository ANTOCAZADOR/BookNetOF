<x-layout>
    <title>Editar Préstamo</title>

    <div class="container py-5">
        <!-- Encabezado -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Editar Préstamo</h1>
            <p class="text-muted fs-5">Actualiza los detalles del préstamo seleccionado.</p>
        </div>

        <!-- Formulario de edición -->
        @can('viewAdminDashboard', Auth::user())
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Detalles del Préstamo</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('prestamo.update', $prestamo) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <!-- Fecha de Préstamo -->
                            <div class="mb-4">
                                <label for="fechaPrestamo" class="form-label">Fecha de Préstamo:</label>
                                <input type="date" name="fechaPrestamo" id="fechaPrestamo" class="form-control" value="{{ old('fechaPrestamo') ?? $prestamo->fechaPrestamo }}">
                            </div>

                            <!-- Fecha de Devolución -->
                            <div class="mb-4">
                                <label for="fechaDevolucionP" class="form-label">Fecha de Devolución:</label>
                                <input type="date" name="fechaDevolucionP" id="fechaDevolucionP" class="form-control" value="{{ old('fechaDevolucionP') ?? $prestamo->fechaDevolucionP }}">
                            </div>

                            <!-- Botón Actualizar -->
                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">Actualizar</button>
                        </form>

                        <!-- Botón Cancelar -->
                        <a href="/prestamo" class="btn btn-secondary btn-lg w-100">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="text-center">
                <p class="alert alert-danger">Acceso denegado.</p>
                <a href="/prestamo" class="btn btn-secondary btn-lg">Aceptar</a>
            </div>
        @endcan
    </div>
</x-layout>
