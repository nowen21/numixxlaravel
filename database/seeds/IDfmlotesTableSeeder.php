<?php



use Illuminate\Database\Seeder;

class IDfmlotesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dfmlotes')->delete();
        
        \DB::table('dfmlotes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'dformula_id' => 1,
                'mlote_id' => 14,
                'volumenx' => 2.0,
                'user_crea_id' => 2,
                'user_edita_id' => 2,
                'sis_esta_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}