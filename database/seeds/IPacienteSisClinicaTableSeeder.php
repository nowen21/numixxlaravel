<?php



use Illuminate\Database\Seeder;

class IPacienteSisClinicaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('paciente_sis_clinica')->delete();
        
        \DB::table('paciente_sis_clinica')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sis_clinica_id' => 1,
                'paciente_id' => 4287,
                'user_crea_id' => 2,
                'user_edita_id' => 2,
                'sis_esta_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}