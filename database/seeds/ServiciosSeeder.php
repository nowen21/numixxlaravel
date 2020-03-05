<?php

use App\Models\Administracion\Servicio;
use Illuminate\Database\Seeder;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicio::create(['servicio'=>'UCI', 'sis_esta_id'=>1, 'user_crea_id'=>1, 'user_edita_id'=>1]);
        Servicio::create(['servicio'=>'UCIN', 'sis_esta_id'=>1, 'user_crea_id'=>1, 'user_edita_id'=>1]);
        Servicio::create(['servicio'=>'UCIP', 'sis_esta_id'=>1, 'user_crea_id'=>1, 'user_edita_id'=>1]);
        Servicio::create(['servicio'=>'HOSP', 'sis_esta_id'=>1, 'user_crea_id'=>1, 'user_edita_id'=>1]);
        Servicio::create(['servicio'=>'CIRUGIA', 'sis_esta_id'=>1, 'user_crea_id'=>1, 'user_edita_id'=>1]);
        Servicio::create(['servicio'=>'URGENCIA', 'sis_esta_id'=>1, 'user_crea_id'=>1, 'user_edita_id'=>1]);
        Servicio::create(['servicio'=>'DOMICILIO', 'sis_esta_id'=>1, 'user_crea_id'=>1, 'user_edita_id'=>1]);
    }
}
