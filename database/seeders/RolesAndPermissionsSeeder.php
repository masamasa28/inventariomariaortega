<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear permisos
        $admin = Role::create(['name' => 'Admin']);
        $proveeCompraAdmi = Role::create(['name' => 'ProveeCompraAdmi']);
        $venderAdmin = Role::create(['name' => 'VenderAdmin']);
        $inventarioAdmi = Role::create(['name' => 'InventarioAdmi']);
        $usuario = Role::create(['name' => 'Usuario']);

        // Crear permisos
        $permissions = [
            'view_any_compras',
            'view_compras',
            'create_compras',
            'update_compras',
            'delete_compras',
            'view_any_productos',
            'view_productos',
            'create_productos',
            'update_productos',
            'delete_productos',
            'view_any_proveedores',
            'view_proveedores',
            'create_proveedores',
            'update_proveedores',
            'delete_proveedores',
            'view_any_clientes',
            'view_clientes',
            'create_clientes',
            'update_clientes',
            'delete_clientes',
            'view_any_sales',
            'view_sales',
            'create_sales',
            'update_sales',
            'delete_sales',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Asignar permisos a roles
        $admin->givePermissionTo(Permission::all());

        $proveeCompraAdmi->givePermissionTo([
            'view_any_compras', 'view_compras', 'create_compras', 'update_compras', 'delete_compras',
            'view_any_proveedores', 'view_proveedores', 'create_proveedores', 'update_proveedores', 'delete_proveedores',
        ]);

        $venderAdmin->givePermissionTo([
            'view_any_clientes', 'view_clientes', 'create_clientes', 'update_clientes', 'delete_clientes',
            'view_any_sales', 'view_sales', 'create_sales', 'update_sales', 'delete_sales',
        ]);

        $inventarioAdmi->givePermissionTo([
            'view_any_productos', 'view_productos', 'create_productos', 'update_productos', 'delete_productos',
        ]);

        $usuario->givePermissionTo([
            'view_any_productos', 'view_productos',
        ]);
    }
}
