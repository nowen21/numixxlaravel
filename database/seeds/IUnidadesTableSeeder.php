<?php



use Illuminate\Database\Seeder;

class IUnidadesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('unidades')->delete();
        
        \DB::table('unidades')->insert(array (
            0 => 
            array (
                'id' => 1,
                'unidad' => 'test',
                'user_crea_id' => 2,
                'user_edita_id' => 2,
                'sis_esta_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}