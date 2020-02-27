<?php


use App\Models\Clinica\SisClinica;
use App\Models\Medicamentos\Medicame;
use Illuminate\Database\Seeder;

class ClinicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $magicosx=  ['sis_esta_id' => 1,'user_crea_id'=>1,'user_edita_id'=>1];
       
       $clinicax= SisClinica::create([
            'nitxxxxx'=>'17496705',
            'clinica'=>'NUMIXX',
            'telefono'=>'12346789',
            'digiveri'=>4,
            'user_crea_id'=>1,
            'user_edita_id'=>1,
            'sis_esta_id'=>1
        ]);

    }
}
