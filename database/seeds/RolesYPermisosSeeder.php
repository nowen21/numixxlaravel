<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesYPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // crear para clinicas
        Permission::create(['name' => 'administracion-modulo',  'descripc' => 'Habilita los permisos para el módulo de administración']);
        // Permission::create(['name' => 'estado-leer',  'descripc' => 'Listar estados']);
        // Permission::create(['name' => 'estado-crear',  'descripc' => 'Crear estado']);
        // Permission::create(['name' => 'estado-editar',  'descripc' => 'Editar estado']);
        // Permission::create(['name' => 'estado-borrar',  'descripc' => 'Inactivar estado']);

        Permission::create(['name' => 'usuario-leer',  'descripc' => 'Listar usuarios']);
        Permission::create(['name' => 'usuario-crear',  'descripc' => 'Crear usuario']);
        Permission::create(['name' => 'usuario-editar',  'descripc' => 'Editar usuario']);
        Permission::create(['name' => 'usuario-borrar',  'descripc' => 'Inactivar usuario']);

        Permission::create(['name' => 'clinica-leer',  'descripc' => 'Listar clínicas']);
        Permission::create(['name' => 'clinica-crear',  'descripc' => 'Crear clínica']);
        Permission::create(['name' => 'clinica-editar',  'descripc' => 'Editar clínica']);
        Permission::create(['name' => 'clinica-borrar',  'descripc' => 'Inactivar clínica']);

        Permission::create(['name' => 'cmedicame-asiganar',  'descripc' => 'Permite asignar medicamentos a una clínica']);
        Permission::create(['name' => 'cmedicame-leer',  'descripc' => 'Listar medicamentos clínica']);
        Permission::create(['name' => 'cmedicame-crear',  'descripc' => 'Asignar medicamento clínica']);
        Permission::create(['name' => 'cmedicame-editar',  'descripc' => 'Editar medicamento clínica']);
        Permission::create(['name' => 'cmedicame-borrar',  'descripc' => 'Inactivar medicamento clínica']);

        Permission::create(['name' => 'cpaciente-asiganar',  'descripc' => 'Permite asignar pacientes a una clínica']);
        Permission::create(['name' => 'cpaciente-leer',  'descripc' => 'Listar pacientes clínica']);
        Permission::create(['name' => 'cpaciente-crear',  'descripc' => 'Asignar paciente clínica']);
        Permission::create(['name' => 'cpaciente-editar',  'descripc' => 'Editar paciente clínica']);
        Permission::create(['name' => 'cpaciente-borrar',  'descripc' => 'Inactivar paciente clínica']);

        Permission::create(['name' => 'crango-asiganar',  'descripc' => 'Permite asignar rangos a una clínica']);
        Permission::create(['name' => 'crango-leer',  'descripc' => 'Listar rangos clínica']);
        Permission::create(['name' => 'crango-crear',  'descripc' => 'Asignar rango clínica']);
        Permission::create(['name' => 'crango-editar',  'descripc' => 'Editar rango clínica']);
        Permission::create(['name' => 'crango-borrar',  'descripc' => 'Inactivar rango clínica']);

       
        Permission::create(['name' => 'cremision-leer',  'descripc' => 'Listar rangos clínica']);
        Permission::create(['name' => 'cremision-crear',  'descripc' => 'Asignar rango clínica']);
        Permission::create(['name' => 'cremision-editar',  'descripc' => 'Editar rango clínica']);
        Permission::create(['name' => 'cremision-borrar',  'descripc' => 'Inactivar rango clínica']);

        Permission::create(['name' => 'cservicio-leer',  'descripc' => 'Listar rangos clínica']);
        Permission::create(['name' => 'cservicio-crear',  'descripc' => 'Asignar rango clínica']);
        Permission::create(['name' => 'cservicio-editar',  'descripc' => 'Editar rango clínica']);
        Permission::create(['name' => 'cservicio-borrar',  'descripc' => 'Inactivar rango clínica']);

        /**
         * medicamentos
         */
        Permission::create(['name' => 'medicamento-modulo',  'descripc' => 'Habilita los permisos para el módulo de medicamentos']);

        Permission::create(['name' => 'casa-leer',  'descripc' => 'Listar casas']);
        Permission::create(['name' => 'casa-crear',  'descripc' => 'Crear casa']);
        Permission::create(['name' => 'casa-editar',  'descripc' => 'Editar casa']);
        Permission::create(['name' => 'casa-borrar',  'descripc' => 'Inactivar casa']);

        Permission::create(['name' => 'medicamento-leer',  'descripc' => 'Listar medicamentos']);
        Permission::create(['name' => 'medicamento-crear',  'descripc' => 'Crear medicamento']);
        Permission::create(['name' => 'medicamento-editar',  'descripc' => 'Editar medicamento']);
        Permission::create(['name' => 'medicamento-borrar',  'descripc' => 'Inactivar medicamento']);

        Permission::create(['name' => 'mmarca-leer',  'descripc' => 'Listar marcas']);
        Permission::create(['name' => 'mmarca-crear',  'descripc' => 'Crear marca']);
        Permission::create(['name' => 'mmarca-editar',  'descripc' => 'Editar marca']);
        Permission::create(['name' => 'mmarca-borrar',  'descripc' => 'Inactivar marca']);

        Permission::create(['name' => 'minvima-leer',  'descripc' => 'Listar listar registros invima']);
        Permission::create(['name' => 'minvima-crear',  'descripc' => 'Crear registro invima']);
        Permission::create(['name' => 'minvima-editar',  'descripc' => 'Editar registro invima']);
        Permission::create(['name' => 'minvima-borrar',  'descripc' => 'Inactivar registro invima']);

        Permission::create(['name' => 'mlote-leer',  'descripc' => 'Listar lotes']);
        Permission::create(['name' => 'mlote-crear',  'descripc' => 'Crear lote']);
        Permission::create(['name' => 'mlote-editar',  'descripc' => 'Editar lote']);
        Permission::create(['name' => 'mlote-borrar',  'descripc' => 'Inactivar lote']);


        /**
         * dispositivos medicos
         */


        Permission::create(['name' => 'dispositivo-modulo',  'descripc' => 'Habilita los permisos para el módulo de dispositivos medicos']);

        Permission::create(['name' => 'dmedico-leer',  'descripc' => 'Listar dispmedis']);
        Permission::create(['name' => 'dmedico-crear',  'descripc' => 'Crear dispmedico']);
        Permission::create(['name' => 'dmedico-editar',  'descripc' => 'Editar dispmedico']);
        Permission::create(['name' => 'dmedico-borrar',  'descripc' => 'Inactivar dispmedico']);

        Permission::create(['name' => 'dmarca-leer',  'descripc' => 'Listar marcas dispositivos médicos']);
        Permission::create(['name' => 'dmarca-crear',  'descripc' => 'Crear marca dispositivos médicos']);
        Permission::create(['name' => 'dmarca-editar',  'descripc' => 'Editar marca dispositivos médicos']);
        Permission::create(['name' => 'dmarca-borrar',  'descripc' => 'Inactivar marca dispositivos médicos']);

        Permission::create(['name' => 'dinvima-leer',  'descripc' => 'Listar listar registros invima dispositivos médicos']);
        Permission::create(['name' => 'dinvima-crear',  'descripc' => 'Crear registro invima dispositivos médicos']);
        Permission::create(['name' => 'dinvima-editar',  'descripc' => 'Editar registro invima dispositivos médicos']);
        Permission::create(['name' => 'dinvima-borrar',  'descripc' => 'Inactivar registro invima dispositivos médicos']);

        Permission::create(['name' => 'dlote-leer',  'descripc' => 'Listar lotes dispositivos médicos']);
        Permission::create(['name' => 'dlote-crear',  'descripc' => 'Crear lote dispositivos médicos']);
        Permission::create(['name' => 'dlote-editar',  'descripc' => 'Editar lote dispositivos médicos']);
        Permission::create(['name' => 'dlote-borrar',  'descripc' => 'Inactivar lote dispositivos médicos']);


        Permission::create(['name' => 'rango-leer',  'descripc' => 'Listar rangos']);
        Permission::create(['name' => 'rango-crear',  'descripc' => 'Crear rango']);
        Permission::create(['name' => 'rango-editar',  'descripc' => 'Editar rango']);
        Permission::create(['name' => 'rango-borrar',  'descripc' => 'Inactivar rango']);


        Permission::create(['name' => 'eps-leer',  'descripc' => 'Listar eps']);
        Permission::create(['name' => 'eps-crear',  'descripc' => 'Crear eps']);
        Permission::create(['name' => 'eps-editar',  'descripc' => 'Editar eps']);
        Permission::create(['name' => 'eps-borrar',  'descripc' => 'Inactivar eps']);

        
        Permission::create(['name' => 'paciente-modulo',  'descripc' => 'Habilita los permisos para el módulo de pacientes']);

        Permission::create(['name' => 'paciente-leer',  'descripc' => 'Listar pacientes']);
        Permission::create(['name' => 'paciente-crear',  'descripc' => 'Crear paciente']);
        Permission::create(['name' => 'paciente-editar',  'descripc' => 'Editar paciente']);
        Permission::create(['name' => 'paciente-borrar',  'descripc' => 'Inactivar paciente']);

        Permission::create(['name' => 'formular-leer',  'descripc' => 'Listar formulaciones pacientes']);
        Permission::create(['name' => 'formular-crear',  'descripc' => 'Crear formulación paciente']);
        Permission::create(['name' => 'formular-editar',  'descripc' => 'Editar formulación paciente']);
        Permission::create(['name' => 'formular-borrar',  'descripc' => 'Inactivar formulación paciente']);


        Role::create(['name' => 'super-administrador',])->givePermissionTo(Permission::all());
    }
}
