<?php



use Illuminate\Database\Seeder;

class IPacienteServicioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('paciente_servicio')->delete();
        
        \DB::table('paciente_servicio')->insert(array (
            0 => 
            array (
                'id' => 1,
                'paciente_id' => 4287,
                'servicio_id' => 6,
                'user_crea_id' => 2,
                'user_edita_id' => 2,
                'sis_esta_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}