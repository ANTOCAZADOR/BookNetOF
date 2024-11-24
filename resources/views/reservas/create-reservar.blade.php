<x-layout>
    <body>
        <title>Crear reserva</title>
        @can('viewAdminDashboard', Auth::user())
            <h1>Crear reserva</h1>
            <form action="{{ route('reserva.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                    <!-- Campo Usuario -->
                <div class="mb-4">
                    <label for="user_id" class="form-label">Usuario:</label>
                    <select name="user_id" id="user_id" class="form-select" required>
                        <option value="">Selecciona un usuario</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Por favor, selecciona un usuario.</div>
                </div>

                <!-- Campo Libro -->
                <div class="mb-4">
                    <label for="libro_id" class="form-label">Libro:</label>
                    <select name="libro_id" id="libro_id" class="form-select" required>
                        <option value="">Selecciona un libro</option>
                        @foreach($libros as $libro)
                            <option value="{{ $libro->id }}" {{ old('libro_id') == $libro->id ? 'selected' : '' }}>
                                {{ $libro->titulo }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Por favor, selecciona un libro.</div>
                </div>

                <!-- Botón Enviar -->
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        @else
            <p>Acceso denegado</p>
            <a href="/user" class="btn btn-primary">Aceptar</a>
        @endcan
    </body>
</x-layout>
