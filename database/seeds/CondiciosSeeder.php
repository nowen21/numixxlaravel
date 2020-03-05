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
        Condicio::create(['condicio'=>'SIN ANINOACIDO', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Condicio::create(['condicio'=>'CON AMINOACIDO', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
        Condicio::create(['condicio'=>'CON OMEGA', 'sis_esta_id'=>1,'user_crea_id'=>1,'user_edita_id'=>1]);
    }
}
