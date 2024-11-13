<x-layout>
<title>Detalles del prestamo</title>
</head>
<body>
    <h1>{{ $prestamo->id }}</h1>
    <form action="{{ route('prestamo.show', $prestamo) }}"method="POST">
    <ul>
        <li>{{ $prestamo->fechaPrestamo }}</li>
        <li>{{ $prestamo->fechaDevolucionP }}</li>
    </ul>

    <a href="{{ route('prestamo.edit', $prestamo) }}">Editar</a><br>

    <form action="{{ route('prestamo.destroy', $prestamo) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Borrar">
    </form>
</body>
</x-layout>