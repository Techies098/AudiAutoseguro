<div class="container text-center" >

    <div class="container" >
        <div class="row mb-3">
            <div class="col-sm-3 col-md-3" >
                <input wire:model="buscar" wire:keydown.enter="buscarUsuarios"
                type="search"
                class="form-control"
                placeholder="Usuario">
            </div>
            <div class="d-grid col-sm-2 col-md-2 mx-auto" >
                <button wire:click= "buscarUsuarios"
                    class="btn btn-secondary"
                    type="button">
                    Buscar
                </button>
            </div>
            <div class="col-sm-7"></div>
        </div>
        
    </div>
    
    <div class="col-md-12" >
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Email</th>
                    <th scope="col">Fecha Nac.</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $fila => $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->roles->pluck('name')->implode(', ') }} </td>
                        <td>{{ $usuario->telefono }} </td>
                        <td>{{ $usuario->direccion }} </td>
                        <td>{{ $usuario->email }} </td>
                        <td>{{ $usuario->fecha_nacimiento}} </td>
                        <td>
                            <a href="{{ route('administrador/usuarios.edit', $usuario) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('administrador/usuarios.destroy', $usuario) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Eliminar Usuario {{$usuario->name}}?')"
                                    class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $usuarios->links() }}

</div>
