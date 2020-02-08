<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // usuarios
      Permission::create([
          'name'=>'Navegar usuarios',
          'slug'=>'users.index',
          'description'=>'Lista y navega todos los usuarios',
      ]);
      Permission::create([
          'name'=>'Ver detalle de un usuario',
          'slug'=>'users.show',
          'description'=>'Ver en detalle cada usuario del sistema',
      ]);
      Permission::create([
          'name'=>'Creación de usuarios',
          'slug'=>'users.create',
          'description'=>'Crar un usuario en el sistema',
      ]);
      Permission::create([
          'name'=>'Edición de usuario',
          'slug'=>'users.edit',
          'description'=>'Editar cualquier dato de un usuario del sistema',
      ]);
      
      //roles
      Permission::create([
          'name'=>'Navegar roles',
          'slug'=>'roles.index',
          'description'=>'Lista y navega todos los roles',
      ]);
      Permission::create([
          'name'=>'Ver detalle de un rol',
          'slug'=>'roles.show',
          'description'=>'Ver en detalle cada rol del sistema',
      ]);
      Permission::create([
          'name'=>'Creación de roles',
          'slug'=>'roles.create',
          'description'=>'Crar un rol en el sistema',
      ]);
      Permission::create([
          'name'=>'Edición de rol',
          'slug'=>'roles.edit',
          'description'=>'Editar cualquier dato de un rol del sistema',
      ]);
      
      //pacientes
      Permission::create([
          'name'=>'Navegar pacientes',
          'slug'=>'pacientes.index',
          'description'=>'Lista y navega todos los pacientes',
      ]);
      Permission::create([
          'name'=>'Ver detalle de un paciente',
          'slug'=>'pacientes.show',
          'description'=>'Ver en detalle cada paciente del sistema',
      ]);
      Permission::create([
          'name'=>'Creación de pacientes',
          'slug'=>'pacientes.create',
          'description'=>'Crar un paciente en el sistema',
      ]);
      Permission::create([
          'name'=>'Edición de paciente',
          'slug'=>'pacientes.edit',
          'description'=>'Editar cualquier dato de un paciente del sistema',
      ]);
      
    }
}
