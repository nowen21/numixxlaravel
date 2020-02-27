<?php

use App\Models\Administracion\Ep;
use Illuminate\Database\Seeder;

class EpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ep::create(['nombre'=>'Cafesalud','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Calisalud','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Caprecom','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Capresoca','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Colmédica','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Compensar','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Comfenalco Antioquia','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Comfenalco Valle','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Convida ARS','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Coomeva EPS','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Cruz Blanca','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Famisanar','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Humana Vivir','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Instituto de los Seguros Sociales','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Salud Colmena','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Salud Colpatria','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Salud Total','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Saludcolombia EPS S.A.','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'SaludCoop','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Saludvida','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Sanitas','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Selvasalud','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Solsalud','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'S.O.S EPS','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
        Ep::create(['nombre'=>'Susalud','sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1,]);
    }
}
