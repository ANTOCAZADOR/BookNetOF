<x-layout>
<title>Detalles de Autor</title>
</head>
<body>
    <h1>{{ $autor->name }}</h1>
    <form action="{{ route('autor.show', $autor) }}"method="POST">
    <ul>
        <li>{{ $autor->apellido }}</li>
        <li>{{ $autor->nacionalidad }}</li>
        <li>{{ $autor->created_at }}</li>
        <li>{{ $autor->updated_at }}</li>
    </ul>

    <a href="{{ route('autor.edit', $autor) }}">Editar</a><br>

    <form action="{{ route('autor.destroy', $autor) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Borrar">
    </form>
</body>
</x-layout>