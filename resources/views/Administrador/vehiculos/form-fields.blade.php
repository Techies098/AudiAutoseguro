<div class="col">
    <div class="mb-3">
        <label for="placa" class="form-label">Placa *</label>
        <input type="text" class="form-control" id="placa" placa="placa"
            value="{{ old('placa', $vehiculos->placa) }}">
        @error('placa')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="clase" class="form-label">Clase</label>
        <input type="number" class="form-control" id="clase" clase="clase"
            value="{{ old('clase', $vehiculos->clase) }}">
        @error('clase')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="marca" class="form-label">marca</label>
        <input type="text" class="form-control" id="marca" marca="marca"
            value="{{ old('marca', $vehiculos->marca) }}">
        @error('marca')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
            value="{{ old('fecha_nacimiento', $vehiculos->fecha_nacimiento) }}">
        @error('fecha_nacimiento')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email *</label>
        <input type="email" class="form-control" id="email" name="email" required
            value="{{ old('email', $vehiculos->email) }}">
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
