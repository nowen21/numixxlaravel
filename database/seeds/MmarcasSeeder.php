<?php

use App\Models\Medicamentos\Mmarca;
use Illuminate\Database\Seeder;

class MmarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mmarca::create(['id' => 1, 'nombcome' => 'AMINOÁCIDOS ADULTOS', 'osmorali' => '990.00', 'pesoespe' => 1.03, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 1, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 2, 'nombcome' => 'AMINOÁCIDOS ADULTOS 15%', 'osmorali' => '1505.00', 'pesoespe' => 1.05, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 2, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 3, 'nombcome' => 'AMINOÁCIDOS PEDIÁTRICOS', 'osmorali' => '885.00', 'pesoespe' => 1.00, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 3, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 4, 'nombcome' => 'GLICEROFOSOFATO DE SODIO', 'osmorali' => '2760.00', 'pesoespe' => 1.15, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 4, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 5, 'nombcome' => 'FOSFATO DE POTASIO', 'osmorali' => '4890.00', 'pesoespe' => 1.00, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 6, 'marcaxxx' => 'PISA', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 6, 'nombcome' => 'DEXTROSA 50%', 'osmorali' => '2523.00', 'pesoespe' => 1.17, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 29, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 7, 'nombcome' => 'DEXTROSA 10%', 'osmorali' => '505.00', 'pesoespe' => 1.03, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 29, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 8, 'nombcome' => 'SODIO CLORURO', 'osmorali' => '4000.00', 'pesoespe' => 1.08, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 9, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 9, 'nombcome' => 'POTASIO CLORURO', 'osmorali' => '4000.00', 'pesoespe' => 1.09, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 10, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 10, 'nombcome' => 'OTRA DESTROSA', 'osmorali' => '504.00', 'pesoespe' => 12.00, 'formfarm' => 'DDDDDDD', 'medicame_id' => 29, 'marcaxxx' => 'OTRA DESTROSA', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 11, 'nombcome' => 'CALCIO GLUCONATO', 'osmorali' => '680.00', 'pesoespe' => 1.05, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 11, 'marcaxxx' => 'BRAUN', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 12, 'nombcome' => 'MAGNESIO SULFATO', 'osmorali' => '1623.00', 'pesoespe' => 1.09, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 12, 'marcaxxx' => 'CORPAUL', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 13, 'nombcome' => 'ELEMENTOS TRAZA (ADDAMEL)', 'osmorali' => '3100.00', 'pesoespe' => 1.10, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 14, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 14, 'nombcome' => 'ELEMENTOS TRAZA PEDIÁTRICOS (PEDITRACE)', 'osmorali' => '38.00', 'pesoespe' => 1.00, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 16, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 15, 'nombcome' => 'MULTIVITAMINAS LIPOSOLUBLES', 'osmorali' => '330.00', 'pesoespe' => 0.99, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 17, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 16, 'nombcome' => 'MULTIVITAMINAS HIDROSOLUBLES', 'osmorali' => '490.00', 'pesoespe' => 1.02, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 18, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 17, 'nombcome' => 'VITAMINA C', 'osmorali' => '1.00', 'pesoespe' => 1.00, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 20, 'marcaxxx' => 'RYAN', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 18, 'nombcome' => 'COMPLEJO B', 'osmorali' => '1.00', 'pesoespe' => 1.00, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 21, 'marcaxxx' => 'ECAR', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 19, 'nombcome' => 'TIAMINA', 'osmorali' => '1.00', 'pesoespe' => 1.00, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 22, 'marcaxxx' => 'ECAR', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 20, 'nombcome' => 'ACIDO FOLICO', 'osmorali' => '1.00', 'pesoespe' => 1.00, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 23, 'marcaxxx' => 'ECAR', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 21, 'nombcome' => 'VITAMINA K', 'osmorali' => '1.00', 'pesoespe' => 1.00, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 23, 'marcaxxx' => 'ECAR', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 22, 'nombcome' => 'OMEGA 3', 'osmorali' => '273.00', 'pesoespe' => 1.00, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 26, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 23, 'nombcome' => 'LIPIDOS CON OMEGA', 'osmorali' => '290.00', 'pesoespe' => 1.00, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 27, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 24, 'nombcome' => 'OMEGAVEN', 'osmorali' => '273.00', 'pesoespe' => 1.00, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 28, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 25, 'nombcome' => 'AGUA ESTERIL', 'osmorali' => '1.00', 'pesoespe' => 1.00, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 29, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 26, 'nombcome' => 'GLUTAMINA', 'osmorali' => '921.00', 'pesoespe' => 1.07, 'formfarm' => 'EMULSION INYECTABLE', 'medicame_id' => 19, 'marcaxxx' => 'FRESSENIUS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 27, 'nombcome' => 'CARBOHDRADO 50%', 'osmorali' => '504.00', 'pesoespe' => 1.00, 'formfarm' => 'DDDDDDD', 'medicame_id' => 7, 'marcaxxx' => 'MARCA', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 28, 'nombcome' => 'LIPIDOS MCT/LCT', 'osmorali' => '504.00', 'pesoespe' => 1.00, 'formfarm' => 'SOLUCION INYECTABLE', 'medicame_id' => 25, 'marcaxxx' => 'LIPIDOS MCT/LCT', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Mmarca::create(['id' => 29, 'nombcome' => 'AGUITAS', 'osmorali' => '1.00', 'pesoespe' => 1.00, 'formfarm' => 'LIQUIDO', 'medicame_id' => 29, 'marcaxxx' => 'AGUITAS', 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    }
}
