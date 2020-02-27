<?php

use App\Models\Medicamentos\Casa;
use Illuminate\Database\Seeder;

class CasasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Casa::create(['id' => 1, 'casa' => 'AMINOÁCIDOS', 'nameidxx' => 'aminoaci', 'unidmedi'=>'%','ordecasa' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 2, 'casa' => 'FOSFATO', 'nameidxx' => 'fosfatox', 'unidmedi'=>'%','ordecasa' => 2, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 3, 'casa' => 'CARBOHIDRATOS', 'nameidxx' => 'carbohid', 'unidmedi'=>'%','ordecasa' => 3, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 4, 'casa' => 'CLORURO DE SODIO', 'nameidxx' => 'sodioxxx', 'unidmedi'=>'%','ordecasa' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 5, 'casa' => 'CLORURO DE POTASIO', 'nameidxx' => 'potasiox', 'unidmedi'=>'%','ordecasa' => 5, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 6, 'casa' => 'GLUCONATO DE CALCIO', 'nameidxx' => 'calcioxxx', 'unidmedi'=>'%','ordecasa' => 6, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 7, 'casa' => 'SULFATO DE MAGNESIO', 'nameidxx' => 'magnesio', 'unidmedi'=>'%','ordecasa' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 8, 'casa' => 'ELEMENTOS TRAZA', 'nameidxx' => 'elemtraz', 'unidmedi'=>'%','ordecasa' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 9, 'casa' => 'MULTIVITAMINAS HIDROSOLUBLE', 'nameidxx' => 'multivit', 'unidmedi'=>'%','ordecasa' => 9, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 10, 'casa' => 'GLUTAMINA', 'nameidxx' => 'glutamin', 'unidmedi'=>'%','ordecasa' => 10, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 11, 'casa' => 'VITAMINA C', 'nameidxx' => 'vitaminc', 'unidmedi'=>'%','ordecasa' => 11, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 12, 'casa' => 'COMPLEJO B', 'nameidxx' => 'complejb', 'unidmedi'=>'%','ordecasa' => 12, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 13, 'casa' => 'TIAMINA', 'nameidxx' => 'tiaminax', 'unidmedi'=>'%','ordecasa' => 13, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 14, 'casa' => 'ÁCIDO FÓLICO', 'nameidxx' => 'acidfoli', 'unidmedi'=>'%','ordecasa' => 14, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 15, 'casa' => 'VITAMINA K', 'nameidxx' => 'vitamink', 'unidmedi'=>'%','ordecasa' => 15, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 16, 'casa' => 'LIPIDOS', 'nameidxx' => 'lipidosx', 'unidmedi'=>'%','ordecasa' => 16, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 17, 'casa' => 'MULTIVITAMINAS LIPOSOLUBLES', 'nameidxx' => 'multiuno', 'unidmedi'=>'%','ordecasa' => 17, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        Casa::create(['id' => 18, 'casa' => 'AGUA', 'nameidxx' => 'aguaeste', 'unidmedi'=>'%','ordecasa' => 18, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    }
}
