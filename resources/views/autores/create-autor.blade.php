<x-layout>
    <title>Crear Autor</title>

    <div class="container py-5">
        <!-- Encabezado -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Crear Autor</h1>
            <p class="text-muted fs-5">Formulario para agregar un nuevo autor.</p>
        </div>

        <!-- Formulario de creación -->
        @can('viewAdminDashboard', Auth::user())
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10"> <!-- Aumenté el tamaño de la columna -->
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Detalles del Autor</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('autor.store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf

                            <!-- Campo Nombre -->
                            <div class="mb-4">
                                <label for="name" class="form-label">Nombre:</label>
                                <input 
                                type="text" 
                                name="name" 
                                class="form-control" 
                                value="{{ old('name') }}"
                                required> <!--Le añadí esto a la validación lo de required-->
                                <div class="valid-feedback"> <!--Le añadí esto a la validación-->
                                    campo validado
                                </div>
                                <div class="invalid-feedback">
                                    Campo nombre obligatorio
                                </div>
                            </div>

                            <!-- Campo Apellido -->
                            <div class="mb-4">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input 
                                type="text" 
                                name="apellido" 
                                class="form-control" 
                                value="{{ old('apellido') }}"
                                required> <!--Le añadí esto a la validación lo de required-->
                                <div class="valid-feedback"> <!--Le añadí esto a la validación-->
                                    campo validado
                                </div>
                                <div class="invalid-feedback">
                                    Campo apellido obligatorio
                                </div>
                            </div>

                            <!-- Campo Nacionalidad -->
                            <div class="mb-4">
                                <label for="nacionalidad" class="form-label">Nacionalidad:</label>
                                <input 
                                type="text" 
                                name="nacionalidad" 
                                class="form-control" 
                                value="{{ old('nacionalidad') }}"
                                required> <!--Le añadí esto a la validación lo de required-->
                                <div class="valid-feedback"> <!--Le añadí esto a la validación-->
                                    campo validado
                                </div>
                                <div class="invalid-feedback">
                                    Campo nacionalidad obligatorio
                                </div>
                            </div>

                            <!-- Botón Enviar -->
                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">Crear Autor</button>
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
