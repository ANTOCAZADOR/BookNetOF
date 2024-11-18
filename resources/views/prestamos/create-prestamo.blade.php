<x-layout>
    <body>
    <title>Crear prestamo</title>
        @can('viewAdminDashboard', Auth::user())
        <h1>Create Prestamo</h1>
        <form action="{{ route('prestamo.store') }}"method="POST">
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

                <br><button type="submit" class="btn btn-primary">Send</button>
        @else
            <p>Acceso denegado</p>
            <a href="/prestamo" class="btn btn-primary">Aceptar</a>
        @endcan
    </body>
</x-layout>