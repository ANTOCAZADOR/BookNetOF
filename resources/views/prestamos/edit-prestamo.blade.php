<x-layout>
    <body>
    <title>Editar prestamo</title>
        @can('viewAdminDashboard', Auth::user())
        <h1>Edit Prestamo</h1>
        <form action="{{ route('prestamo.update', $prestamo) }}"method="POST">
            @csrf
            @method('PATCH')
                <label for="fechaPrestamo">Fecha Prestamo:</label><br>
                <input type="date" name="fechaPrestamo" id="fechaPrestamo" value="{{ old('fechaPrestamo') ?? $prestamo->fechaPrestamo }}"><br>

                <br><label for="fechaDevolucionP">Fecha Devolucion:</label><br>
                <input type="date" name="fechaDevolucionP" id="fechaDevolucionP" value="{{ old('fechaDevolucionP') ?? $prestamo->fechaDevolucionP}}"><br>

                <br><button type="submit" class="btn btn-primary">Send</button>
        @else
            <p>Acceso denegado</p>
            <a href="/prestamo" class="btn btn-primary">Aceptar</a>
        @endcan
    </body>
</x-layout>