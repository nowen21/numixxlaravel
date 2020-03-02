<?php

use App\Models\Clinica\SisClinica;
use App\Models\Medicamentos\Medicame;
use Illuminate\Database\Seeder;

class MedicamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $magicosx=  ['sis_esta_id' => 1,'user_crea_id'=>1,'user_edita_id'=>1];
        $nptsxxxx=[1=>$magicosx,2=>$magicosx,3=>$magicosx];

        $medicame=Medicame::create(['id' => 1, 'sis_clinica_id' => '1', 'nombgene' => 'AMINOÁCIDOS S/E 10%', 'concentr' => 10.00, 'unidmedi' => '%', 'casa_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 2, 'sis_clinica_id' => '1', 'nombgene' => 'AMINOÁCIDOS S/E 15%', 'concentr' => 15.00, 'unidmedi' => '%', 'casa_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 3, 'sis_clinica_id' => '1', 'nombgene' => 'AMINOÁCIDOS PEDIÁTRICOS', 'concentr' => 10.00, 'unidmedi' => '%', 'casa_id' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 4, 'sis_clinica_id' => '1', 'nombgene' => 'GLICEROFOSFATO DE SODIO', 'concentr' => 1.00, 'unidmedi' => 'mmol/ mL', 'casa_id' => 2, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 5, 'sis_clinica_id' => '1', 'nombgene' => 'FOSFATO DE POTASIO 2.6 MMOL/ML', 'concentr' => 2.60, 'unidmedi' => 'mmol/ mL', 'casa_id' => 2, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 6, 'sis_clinica_id' => '1', 'nombgene' => 'FOSFATO DE POTASIO 1MMOL/ML', 'concentr' => 1.00, 'unidmedi' => 'mmol/ mL', 'casa_id' => 2, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 7, 'sis_clinica_id' => '1', 'nombgene' => 'CARBOHIDRATOS 50% (NUMIXX SAS)', 'concentr' => 50.00, 'unidmedi' => '%', 'casa_id' => 3, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 8, 'sis_clinica_id' => '1', 'nombgene' => 'CARBOHIDRATOS 10%', 'concentr' => 10.00, 'unidmedi' => '%', 'casa_id' => 3, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 9, 'sis_clinica_id' => '1', 'nombgene' => 'SODIO CLORURO', 'concentr' => 2.00, 'unidmedi' => 'mEq/mL', 'casa_id' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 10, 'sis_clinica_id' => '1', 'nombgene' => 'POTASIO CLORURO', 'concentr' => 2.00, 'unidmedi' => 'mEq/mL', 'casa_id' => 5, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 11, 'sis_clinica_id' => '1', 'nombgene' => 'CALCIO GLUCONATO', 'concentr' => 10.00, 'unidmedi' => '%', 'casa_id' => 6, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 12, 'sis_clinica_id' => '1', 'nombgene' => 'MAGNESIO SULFATO', 'concentr' => 20.00, 'unidmedi' => '%', 'casa_id' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 13, 'sis_clinica_id' => '1', 'nombgene' => 'ELEMENTOS TRAZA 330 MCZN', 'concentr' => 330.00, 'unidmedi' => 'mcgZn/mL', 'casa_id' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 14, 'sis_clinica_id' => '1', 'nombgene' => 'ELEMENTOS TRAZA 654 MCZN', 'concentr' => 654.00, 'unidmedi' => 'mcgZn/mL', 'casa_id' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 15, 'sis_clinica_id' => '1', 'nombgene' => 'ELEMENTOS TRAZA 1000 MCZN', 'concentr' => 1000.00, 'unidmedi' => 'mcgZn/mL', 'casa_id' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 16, 'sis_clinica_id' => '1', 'nombgene' => 'ELEMENTOS TRAZA PEDIÁTRICOS', 'concentr' => 250.00, 'unidmedi' => 'mcgZn/mL', 'casa_id' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 17, 'sis_clinica_id' => '1', 'nombgene' => 'MULTIVITAMINAS LIPOSOLUBLES', 'concentr' => 0.99, 'unidmedi' => 'mg Vit A/mL', 'casa_id' => 17, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 18, 'sis_clinica_id' => '1', 'nombgene' => 'MULTIVITAMINAS HIDROSOLUBLES', 'concentr' => 0.99, 'unidmedi' => 'mg Vit A/mL', 'casa_id' => 9, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 19, 'sis_clinica_id' => '1', 'nombgene' => 'GLUTAMINA', 'concentr' => 20.00, 'unidmedi' => 'ML', 'casa_id' => 10, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 20, 'sis_clinica_id' => '1', 'nombgene' => 'VITAMINA C', 'concentr' => 10.00, 'unidmedi' => '%', 'casa_id' => 11, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 21, 'sis_clinica_id' => '1', 'nombgene' => 'COMPLEJO B', 'concentr' => 100.00, 'unidmedi' => 'mg/mL', 'casa_id' => 12, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 22, 'sis_clinica_id' => '1', 'nombgene' => 'TIAMINA', 'concentr' => 10.00, 'unidmedi' => 'mL', 'casa_id' => 13, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 23, 'sis_clinica_id' => '1', 'nombgene' => 'ÁCIDO FÓLICO', 'concentr' => 100.00, 'unidmedi' => 'mg/mL', 'casa_id' => 14, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 24, 'sis_clinica_id' => '1', 'nombgene' => 'VITAMINA K', 'concentr' => 10.00, 'unidmedi' => 'mg/mL', 'casa_id' => 15, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 25, 'sis_clinica_id' => '1', 'nombgene' => 'LÍPIDOS MCT/LCT', 'concentr' => 10.00, 'unidmedi' => 'mg/ mL', 'casa_id' => 16, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 26, 'sis_clinica_id' => '1', 'nombgene' => 'LÍPIDOS CON OMEGA 3', 'concentr' => 20.00, 'unidmedi' => '%', 'casa_id' => 16, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 27, 'sis_clinica_id' => '1', 'nombgene' => 'OMEGA 3', 'concentr' => 20.00, 'unidmedi' => '%', 'casa_id' => 16, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 28, 'sis_clinica_id' => '1', 'nombgene' => 'MULTIVITAMINAS HIDROSOLUBLE PEDIÁTRICAS', 'concentr' => 10.00, 'unidmedi' => '%', 'casa_id' => 9, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);
        $medicame=Medicame::create(['id' => 29, 'sis_clinica_id' => '1', 'nombgene' => 'AGUA ESTERIL (NUMIXX SAS)', 'concentr' => 0.99, 'unidmedi' => 'mg Vit A/mL', 'casa_id' => 18, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        ////$medicame->npts()->sync($nptsxxxx);

        $clinicax=SisClinica::find(1);
        $syncxxxx = [];
        foreach (Medicame::all() as $value) {
          $syncxxxx[$value->id] = $magicosx;
        }
        $clinicax->medicames()->sync($syncxxxx);
    }
}
