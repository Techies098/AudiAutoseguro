<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roleCliente = Role::create(['name' => 'cliente']);
        $roleVendedor = Role::create(['name' => 'vendedor']);
        $rolePerito = Role::create(['name' => 'perito']);
        $roleAdministrador = Role::create(['name' => 'administrador']);

        //Usuarios
        Permission::create([
            'name' => 'administrador.usuarios.index', 'description' => 'Ver listado de usuarios'
            ])->syncRoles([$roleAdministrador, $roleVendedor, $rolePerito]);

        Permission::create([
            'name' => 'administrador.usuarios.create', 'description' => 'Crear usuarios'
            ])->syncRoles([$roleAdministrador]);
        
        Permission::create([
            'name' => 'administrador.usuarios.edit', 'description' => 'Editar usuarios'
            ])->syncRoles([$roleAdministrador]);
        
        Permission::create([
            'name' => 'administrador.usuarios.destroy', 'description' => 'Eliminar usuarios'
            ])->syncRoles([$roleAdministrador]);
        
    }
}
