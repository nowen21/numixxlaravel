<?php

use App\Models\Administracion\Condicio;
use Illuminate\Database\Seeder;

class CondiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Condicio::create(['condicio'=>'C/ SMOFLIPID', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Condicio::create(['condicio'=>'C/LIPIDOS', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Condicio::create(['condicio'=>'C/LIPIDOS  OMEGA', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Condicio::create(['condicio'=>'C/LIPIDOS CON OMEGA 3', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Condicio::create(['condicio'=>'C/LIPIDOS OMEGA', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Condicio::create(['condicio'=>'C/LIPIDOS SMOFLIPID', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Condicio::create(['condicio'=>'C/S LIPIDOS', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Condicio::create(['condicio'=>'C/S LIPIDOS + AMIN 15%', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Condicio::create(['condicio'=>'C/S SMOFLIPID', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Condicio::create(['condicio'=>'C/SMOFLIPID', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Condicio::create(['condicio'=>'S/E**', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Condicio::create(['condicio'=>'S/LIPIDOS', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
    }
}
