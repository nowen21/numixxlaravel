<?php



use Illuminate\Database\Seeder;

class IProPreplibesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pro_preplibes')->delete();
        
        \DB::table('pro_preplibes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'userevis_id' => 2,
                'userprep_id' => 2,
                'user_crea_id' => 2,
                'user_edita_id' => 2,
                'sis_esta_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}