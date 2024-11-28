<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role0 = Role::create(['name' => 'gestion_conductores']);
        $role1 = Role::create(['name' => 'servicio_medico']);
        $role2 = Role::create(['name' => 'asignacion_conductores']);

        // Asignar roles a un usuario
        $user = User::find(1); 
        $user->roles()->attach($role1); // Asigna el rol de servicio médico
        $user = User::find(2);
    }
}
