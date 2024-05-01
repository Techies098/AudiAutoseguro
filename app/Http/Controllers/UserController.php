<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Cliente;
use App\Models\Perito;
use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('can:administrador.usuarios.index')->only('index');
        $this->middleware('can:administrador.usuarios.create')->only('create', 'store');
        $this->middleware('can:administrador.usuarios.edit')->only('edit', 'update');
        $this->middleware('can:administrador.usuarios.destroy')->only('destroy');
    }

    public function index()
    {
        // $users = User::all();
        return view('administrador.usuarios.index');
    }

    public function create()
    {
        $roles = Role::all();
        return view('administrador.usuarios.create', [
            'user' => new User(),
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'telefono' => 'numeric|nullable',
            'direccion' => 'max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role_id' => 'required'
        ]);

        $password = bcrypt($request->password);
        $request->merge(['password' => $password]);
        $user = User::create($request->all());

        $user->roles()->sync($request->role_id);

        $role_id = $request->role_id;

        if($role_id == 1){//Cliente
            Cliente::create(['user_id' => $user->id]);
        } else if($role_id == 2){//Vendedor
            Vendedor::create(['user_id' => $user->id]);
        } else if($role_id == 3){//Perito
            Perito::create(['user_id' => $user->id]);
        } else if($role_id == 4){//Administrador
            Administrador::create(['user_id' => $user->id]);
        }

        return redirect()->route('administrador/usuarios.index')
            ->with('msj_ok', 'Creado: ' . $user->name);

    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('administrador.usuarios.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'telefono' => 'numeric|nullable',
            'direccion' => 'max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required'
        ]);

        $rolAnterior = $user->roles->first()->id;
        $rolActual = $request->role_id;
        if($rolAnterior != $rolActual){
            $user->roles()->detach($rolAnterior);
            //Eliminar modelo:
            if($rolAnterior == 1){//Cliente
                $cliente = Cliente::where('user_id', $user->id)->first();
                $cliente->delete();
            } else if($rolAnterior = 2){//Vendedor
                $vendedor = Vendedor::where('user_id', $user->id)->first();
                $vendedor->delete();
            } else if($rolAnterior = 3){//Perito
                $perito = Perito::where('user_id', $user->id)->first();
                $perito->delete();
            } else if($rolAnterior = 4){//Administrador
                $administrador = Administrador::where('user_id', $user->id)->first();
                $administrador->delete();
            }

            //Crear modelo:
            $role_id = $rolActual;
        
            if($role_id == 1){//Cliente
                Cliente::create(['user_id' => $user->id]);
            } else if($role_id = 2){//Vendedor
                Vendedor::create(['user_id' => $user->id]);
            } else if($role_id = 3){//Perito
                Perito::create(['user_id' => $user->id]);
            } else if($role_id = 4){//Administrador
                Administrador::create(['user_id' => $user->id]);
            }
            
        }

        $user->update($request->all());
        $user->roles()->sync($request->role_id);

        return redirect()->route('administrador/usuarios.index')
            ->with('msj_ok', 'Actualizado: ' . $user->name);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('administrador/usuarios.index')
            ->with('msj_ok', 'Eliminado: ' . $user->name);
    }
}
