<x-layout>
    <title>Editar genero</title>
    <body>
        @can('viewAdminDashboard', Auth::user())
        <h1>Edit genero</h1>
        <form action="{{ route('genero.update', $genero) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="card-body">
            <label for="name" class="form-label">Name:</label><br>
            <input type="text" name="name" class="form-control" tabindex="1" value="{{ old('name') ?? $genero->name }}"><br>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form>
        @else
            <p>Access denied.</p>
        @endcan
    </body>
</x-layout>