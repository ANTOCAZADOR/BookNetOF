<x-layout>
<title>Detalles del libro</title>
</head>
<body>
    <h1>{{ $libro->autor }}</h1>
    <form action="{{ route('libro.show', $libro) }}"method="POST">
    <ul>
        <li>{{ $libro->estatus }}</li>
        <li>{{ $libro->ISBN }}</li>
        <li>{{ $libro->editorial }}</li>
        <li>{{ $libro->fechaPublicacion }}</li>
        <li>{{ $libro->created_at }}</li>
        <li>{{ $libro->updated_at }}</li>
    </ul>

    <a href="{{ route('libro.edit', $libro) }}">Editar</a><br>

    <form action="{{ route('libro.destroy', $libro) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Borrar">
    </form>
</body>
</x-layout>