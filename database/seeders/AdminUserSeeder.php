<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Crea o encuentra el usuario admin
         $admin = User::firstOrCreate([
            'email' => 'mafe@gmail.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('mafe@gmail.com'), // Cambia a una contraseña segura
        ]);

        // Crea o asigna el rol de administrador
        $role = Role::firstOrCreate(['name' => 'admin']);
        $admin->assignRole($role);

        // Puedes agregar permisos al rol de admin si es necesario
        // $role->givePermissionTo('acceder-panel-admin');
    }
    }

