<x-layout>
    <title>Editar Usuario</title>

    <div class="container py-5">
        <!-- Encabezado -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Editar Usuario</h1>
            <p class="text-muted fs-5">Modifica la información del usuario en esta página. Asegúrate de revisar todos los campos antes de guardar los cambios.</p>
        </div>

        @can('viewAdminDashboard', Auth::user())
        <!-- Formulario -->
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <form action="{{ route('user.update', $user) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <!-- Campo Nombre -->
                            <div class="mb-5">
                                <label for="name" class="form-label fs-4 fw-bold">Nombre</label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    class="form-control form-control-lg" 
                                    value="{{ old('name') ?? $user->name }}" 
                                    placeholder="Ingresa el nombre del usuario">
                            </div>

                            <!-- Campo Rol -->
                            <div class="mb-5">
                                <label for="rol" class="form-label fs-4 fw-bold">Rol</label>
                                <select 
                                    id="rol" 
                                    name="rol" 
                                    class="form-select form-select-lg">
                                    <option value="user" {{ (old('rol') ?? $user->rol) == 'user' ? 'selected' : '' }}>Usuario</option>
                                    <option value="administrator" {{ (old('rol') ?? $user->rol) == 'administrator' ? 'selected' : '' }}>Administrador</option>
                                </select>
                            </div>

                            <!-- Campo Email -->
                            <div class="mb-5">
                                <label for="email" class="form-label fs-4 fw-bold">Email</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    class="form-control form-control-lg" 
                                    value="{{ old('email') ?? $user->email }}" 
                                    placeholder="Ingresa el correo electrónico">
                                @error('email')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Campo Contraseña -->
                            <div class="mb-5">
                                <label for="password" class="form-label fs-4 fw-bold">Contraseña</label>
                                <input 
                                    type="password" 
                                    name="password" 
                                    class="form-control form-control-lg" 
                                    value="{{ old('password') }}" 
                                    placeholder="Ingresa una nueva contraseña (opcional)">
                                <small class="text-muted">Deja este campo vacío si no deseas cambiar la contraseña.</small>
                            </div>

                            <!-- Botones -->
                            <div class="d-flex justify-content-between mt-4">
                                <a href="/user" class="btn btn-secondary btn-lg px-5">
                                    <i class="fas fa-arrow-left"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fas fa-save"></i> Guardar Cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Acceso denegado -->
        <div class="text-center mt-5">
            <div class="alert alert-danger fs-4">
                Acceso denegado.
            </div>
            <a href="/user" class="btn btn-secondary btn-lg">Regresar</a>
        </div>
        @endcan
    </div>
</x-layout>
