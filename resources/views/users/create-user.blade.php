<x-layout>
    <title>Crear Usuario</title>

    <div class="container py-5">
        @can('viewAdminDashboard', Auth::user())
            <!-- Encabezado -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold">Crear Nuevo Usuario</h1>
                <p class="text-muted fs-5">Completa el siguiente formulario para añadir un nuevo usuario al sistema.</p>
            </div>

            <!-- Formulario -->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card shadow-lg">
                        <div class="card-header bg-primary text-white text-center">
                            <h4>Formulario de Registro</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.store') }}" method="POST">
                                @csrf

                                <!-- Nombre -->
                                <div class="mb-4">
                                    <label for="name" class="form-label fs-5">Nombre:</label>
                                    <input 
                                        type="text" 
                                        name="name" 
                                        id="name" 
                                        class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                        value="{{ old('name') }}" 
                                        placeholder="Ingresa el nombre completo">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Rol -->
                                <div class="mb-4">
                                    <label for="rol" class="form-label fs-5">Rol:</label>
                                    <select id="rol" name="rol" class="form-select form-select-lg">
                                        <option value="user">user</option>
                                        <option value="administrator">administrador</option>
                                    </select>
                                </div>

                                <!-- Email -->
                                <div class="mb-4">
                                    <label for="email" class="form-label fs-5">Correo Electrónico:</label>
                                    <input 
                                        type="email" 
                                        name="email" 
                                        id="email" 
                                        class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                        value="{{ old('email') }}" 
                                        placeholder="Ingresa el correo electrónico">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Contraseña -->
                                <div class="mb-4">
                                    <label for="password" class="form-label fs-5">Contraseña:</label>
                                    <input 
                                        type="password" 
                                        name="password" 
                                        id="password" 
                                        class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                        placeholder="Crea una contraseña">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Botones -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="/user" class="btn btn-outline-secondary btn-lg">
                                        <i class="fas fa-arrow-left"></i> Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save"></i> Registrar Usuario
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Acceso Denegado -->
            <div class="alert alert-danger text-center">
                <h4>Acceso Denegado</h4>
                <p>No tienes permisos para realizar esta acción.</p>
                <a href="/user" class="btn btn-primary btn-lg">Volver</a>
            </div>
        @endcan
    </div>
</x-layout>
