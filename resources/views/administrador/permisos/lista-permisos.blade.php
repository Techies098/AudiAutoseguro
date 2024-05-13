<div>
    <ul class="list-group list-group-flush">
        <form action="{{ route('administrador/permisos.guardar', ['user' => $user->id]) }}" method="POST">
            
            @foreach ($permissions as $permission)
                <li class="list-group-item">
                    <input class="form-check-input mr-2" type="checkbox" value="{{ $permission->id }}" id="permission_{{ $permission->id }}" name="permissions[]" @if(in_array($permission->id, $rolePermissions)) checked disabled @elseif(in_array($permission->id, $userPermissions)) checked @endif>
                    <label class="form-check-label" for="permission_{{ $permission->id }}">{{ $permission->name . ' - ' . $permission->description }}</label>
                </li>
            @endforeach
            <br>
            @csrf
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </ul>
</div>
