<x-layout>
    @can('viewAdminDashboard', Auth::user())
    <h1>Create Genero</h1>
    <form action="{{ route('genero.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" tabindex="1" value="{{ old('name') }}">
        </div>

       <button type="submit" class="btn btn-primary">Send</button>
    </form>
    @else
        <p>Acceso denegado</p>
        <a href="{{ route('genero.index') }}" class="btn btn-primary">Aceptar</a>
    @endcan
</x-layout>