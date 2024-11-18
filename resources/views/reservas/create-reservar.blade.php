<x-layout>
    <body>
        <title>Crear reserva</title>
        @can('viewAdminDashboard', Auth::user())
            <h1>Crear reserva</h1>
            <form action="{{ route('reserva.store') }}" method="POST">
                @csrf
                    <label for="user_id">Usuario:</label>
                    <select name="user_id" id="user_id">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>

                    <label for="libro_id">Libro:</label>
                    <select name="libro_id" id="libro_id">
                        @foreach($libros as $libro)
                            <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                        @endforeach
                    </select>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        @else
            <p>Acceso denegado</p>
            <a href="/user" class="btn btn-primary">Aceptar</a>
        @endcan
    </body>
</x-layout>
