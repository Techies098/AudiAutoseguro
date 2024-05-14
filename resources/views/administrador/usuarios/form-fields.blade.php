<div class="col">
    <div class="mb-3">
        <label for="name" class="form-label">Nombre *</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Telefono</label>
        <input type="number" class="form-control" id="telefono" name="telefono"
            value="{{ old('telefono', $user->telefono) }}">
        @error('telefono')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="direccion" class="form-label">Direccion</label>
        <input type="text" class="form-control" id="direccion" name="direccion"
            value="{{ old('direccion', $user->direccion) }}">
        @error('direccion')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
            value="{{ old('fecha_nacimiento', $user->fecha_nacimiento) }}">
        @error('fecha_nacimiento')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email *</label>
        <input type="email" class="form-control" id="email" name="email" required
            value="{{ old('email', $user->email) }}">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña *</label>
        <input type="password" class="form-control" id="password" name="password" required>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="role_id" class="form-label">Rol de usuario *</label>
        <select name="role_id" id="role_id" class="form-control">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}"
                    {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                    {{ $role->id }} - {{ $role->name }}
                </option>
            @endforeach
        </select>
    </div>


    <button type="submit" class="btn btn-primary">Guardar</button>
