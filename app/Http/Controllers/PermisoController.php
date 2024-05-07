<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    //Show se usa para la gestión de permisos del usuario
    public function show(User $user)
    {
        $permissions = Permission::all();
        
        // Obtener los permisos asignados directamente al usuario
        $userPermissions = $user->permissions->pluck('id')->toArray(); 

        // Obtener los permisos asignados a través del rol del usuario
        $rolePermissions = $user->roles->flatMap->permissions->pluck('id')->toArray(); 

        // Fusionar y eliminar duplicados
        $allUserPermissions = array_unique(array_merge($userPermissions, $rolePermissions));

        return view('administrador.permisos.show', [
            'user' => $user,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
            'userPermissions' => $userPermissions,
            'allUserPermissions' => $allUserPermissions // Pasar los IDs de todos los permisos al usuario a la vista
        ]);
    }
    public function guardar(Request $request, User $user){
        // return $user;
        $user->permissions()->sync($request->permissions);
        return redirect()->route('administrador/usuarios.index')
            ->with('msj_ok', 'Permisos del usuario actualizados: ' . $user->name);
    }
}
