<!-- resources/views/user/create.blade.php -->
<x-layout>
    @can('viewAdminDashboard', Auth::user())
        <h1>Crear Usuario</h1>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" tabindex="1" value="{{ old('name') }}">
            </div>

            <div class="card-body">
                <label for="rol">Selecciona tu rol:</label>
                <select id="rol" name="rol" class="form-select">
                    <option value="user">user</option>
                    <option value="administrator">administrator</option>
                </select>
            </div>

            <div class="card-body">
                <label for="email" class="form-label">Email:</label>
                <input type="text" name="email" class="form-control" tabindex="2" value="{{ old('email') }}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="card-body">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" tabindex="3">
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    @else
        <p>Acceso denegado</p>
        <a href="{{ route('user.index') }}" class="btn btn-primary">Aceptar</a>
    @endcan
</x-layout>