<x-layout>
    <title>Editar usuario</title>
    <body>
        @can('viewAdminDashboard', Auth::user())
        <h1>Edit User</h1>
        <form action="{{ route('user.update', $user) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="card-body">
            <label for= "name" class="form-label">Name:</label><br>
            <input type="text" name="name" class="form-control" tabindex="1" value="{{ old('name') ?? $user->name }}"><br>
            </div>

            <label for="rol">Selecciona tu rol:</label>
            <select id="rol" name="rol">
                <option value="user" {{ (old('rol') ?? $user->rol) == 'user' ? 'selected' : '' }}>user</option>
                <option value="administrator" {{ (old('rol') ?? $user->rol) == 'administrator' ? 'selected' : '' }}>administrator</option>
            </select>

            <div class="card-body">
            <label for= "email" class="form-label">Email:</label><br>
            <input type="text" name="email" class="form-control" tabindex="1" value="{{ old('email') ?? $user->email }}">
            </div>

            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="card-body">
            <label for= "password" class="form-label">Password:</label><br>
            <input type="text" name="password" class="form-control" tabindex="1" value="{{ old('password') ?? $user->password}}"><br>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>       
        </form>
        @else
            <p>Access denied.</p>
        @endcan
    </body>
</x-layout>