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

        //Coberturas
        Permission::create([
            'name' => 'administrador.coberturas.index', 'description' => 'Ver listado de coberturas'
        ])->syncRoles([$roleAdministrador, $roleVendedor, $rolePerito]);

        Permission::create([
            'name' => 'administrador.coberturas.create', 'description' => 'Crear coberturas'
        ])->syncRoles([$roleAdministrador]);

        Permission::create([
            'name' => 'administrador.coberturas.edit', 'description' => 'Editar coberturas'
        ])->syncRoles([$roleAdministrador]);

        Permission::create([
            'name' => 'administrador.coberturas.destroy', 'description' => 'Eliminar coberturas'
        ])->syncRoles([$roleAdministrador]);
        //Clausulas
        Permission::create([
            'name' => 'administrador.clausulas.index', 'description' => 'Ver listado de clausulas'
        ])->syncRoles([$roleAdministrador, $roleVendedor, $rolePerito]);

        Permission::create([
            'name' => 'administrador.clausulas.create', 'description' => 'Crear clausulas'
        ])->syncRoles([$roleAdministrador]);

        Permission::create([
            'name' => 'administrador.clausulas.edit', 'description' => 'Editar clausulas'
        ])->syncRoles([$roleAdministrador]);

        Permission::create([
            'name' => 'administrador.clausulas.destroy', 'description' => 'Eliminar clausulas'
        ])->syncRoles([$roleAdministrador]);

        //Seguros
        Permission::create([
            'name' => 'administrador.seguros.index', 'description' => 'Ver listado de seguros'
        ])->syncRoles([$roleAdministrador, $roleVendedor, $rolePerito, $roleCliente]);

        Permission::create([
            'name' => 'administrador.seguros.create', 'description' => 'Crear seguros'
        ])->syncRoles([$roleAdministrador]);

        Permission::create([
            'name' => 'administrador.seguros.edit', 'description' => 'Editar seguros'
        ])->syncRoles([$roleAdministrador]);

        Permission::create([
            'name' => 'administrador.seguros.destroy', 'description' => 'Eliminar seguros'
        ])->syncRoles([$roleAdministrador]);
        Permission::create([
            'name' => 'administrador.seguros.relacionar', 'description' => 'Eliminar seguros'
        ])->syncRoles([$roleAdministrador]);

        //Vehiculos
        Permission::create([
            'name' => 'administrador.vehiculos.index', 'description' => 'Ver listado de vehiculos'
        ])->syncRoles([$roleAdministrador, $roleVendedor, $rolePerito, $roleCliente]);

        Permission::create([
            'name' => 'administrador.vehiculos.create', 'description' => 'Crear vehiculos'
        ])->syncRoles([$roleAdministrador]);

        Permission::create([
            'name' => 'administrador.vehiculos.edit', 'description' => 'Editar vehiculos'
        ])->syncRoles([$roleAdministrador]);

        Permission::create([
            'name' => 'administrador.vehiculos.destroy', 'description' => 'Eliminar vehiculos'
        ])->syncRoles([$roleAdministrador]);

        //Vista del cliente:
        Permission::create([
            'name' => 'cliente.contratos.index', 'description' => 'Ver listado de contratos'
        ])->syncRoles([$roleCliente]);

        //Talleres
        Permission::create([
            'name' => 'administrador.talleres.index', 'description' => 'Ver listado de talleres'
        ])->syncRoles([$roleAdministrador]);

        Permission::create([
            'name' => 'administrador.talleres.create', 'description' => 'Crear talleres'
        ])->syncRoles([$roleAdministrador]);

        Permission::create([
            'name' => 'administrador.talleres.edit', 'description' => 'Editar talleres'
        ])->syncRoles([$roleAdministrador]);

        Permission::create([
            'name' => 'administrador.talleres.show', 'description' => 'Vista del taller'
        ])->syncRoles([$roleAdministrador]);

        Permission::create([
            'name' => 'administrador.talleres.destroy', 'description' => 'Eliminar talleres'
        ])->syncRoles([$roleAdministrador]);

        Permission::create([
            'name' => 'talleres.cambiarEstado', 'description' => 'Cambiar estado del taller'
        ])->syncRoles([$roleAdministrador]);

        //Contratos
        Permission::create([
            'name' => 'administrador.contratos.index', 'description' => 'Ver listado de contratos'
        ])->syncRoles([$roleAdministrador, $roleVendedor]);

        Permission::create([
            'name' => 'administrador.contratos.create', 'description' => 'Crear contratos'
        ])->syncRoles([$roleVendedor]);

        Permission::create([
            'name' => 'administrador.contratos.edit', 'description' => 'Editar contratos'
        ])->syncRoles([$roleVendedor]);

        Permission::create([
            'name' => 'administrador.contratos.show', 'description' => 'Vista del contrato'
        ])->syncRoles([$roleAdministrador, $roleVendedor]);

        Permission::create([
            'name' => 'administrador.contratos.destroy', 'description' => 'Eliminar contratos'
        ])->syncRoles([$roleVendedor]);

        Permission::create([
            'name' => 'pdf-contrato', 'description' => 'Genera contrato' //genera un contrato en formato pdf de
        ])->syncRoles([$roleAdministrador, $roleVendedor]);

        Permission::create([
            'name' => 'contratos.cobertura-clausulas', 'description' => 'Get Coberturas y Clausulas' //Devuelve las coberturas y clausulas de un seguro
        ])->syncRoles([$roleAdministrador, $roleVendedor]);
    }
}
