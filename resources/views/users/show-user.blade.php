<x-layout>
    <title>Detalles del Usuario</title>

    <div class="container py-5">
        <!-- Encabezado -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Detalles del Usuario</h1>
            <p class="text-muted fs-5">Información detallada del usuario seleccionado.</p>
        </div>

        <!-- Tarjeta de detalles -->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>{{ $user->name }}</h4>
                    </div>
                    <div class="card-body">
                        <!-- Detalles del Usuario -->
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item">
                                <strong>Email:</strong> {{ $user->email }}
                            </li>
                            <li class="list-group-item">
                                <strong>Rol:</strong> {{ ucfirst($user->rol) }}
                            </li>
                            <li class="list-group-item">
                                <strong>Fecha de Creación:</strong> {{ $user->created_at->format('d-m-Y H:i') }}
                            </li>
                            <li class="list-group-item">
                                <strong>Última Actualización:</strong> {{ $user->updated_at->format('d-m-Y H:i') }}
                            </li>
                        </ul>

                        <!-- Botones de acción -->
                        <div class="d-flex justify-content-between">
                            <!-- Botón Editar -->
                            <a href="{{ route('user.edit', $user) }}" class="btn btn-warning btn-lg">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('user.destroy', $user) }}" method="POST" class="d-inline-block">
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
            <a href="/user" class="btn btn-secondary btn-lg">
                <i class="fas fa-arrow-left"></i> Regresar a la lista de usuarios
            </a>
        </div>
    </div>
</x-layout>
