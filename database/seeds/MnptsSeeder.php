<?php

use App\Models\Medicamentos\Mnpt;
use Illuminate\Database\Seeder;

class MnptsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mnpt::create(['id' => 1, 'medicame_id' => 1, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 0.5, 'ranhasta' => 2, 'rangunid' => 'g/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 2, 'medicame_id' => 2, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 0.5, 'ranhasta' => 2, 'rangunid' => 'g/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 3, 'medicame_id' => 4, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 0.1, 'ranhasta' => 0.5, 'rangunid' => 'g/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 4, 'medicame_id' => 5, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 10, 'ranhasta' => 20, 'rangunid' => 'mmol/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 5, 'medicame_id' => 6, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 10, 'ranhasta' => 20, 'rangunid' => 'mmol/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 6, 'medicame_id' => 7, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 10, 'ranhasta' => 20, 'rangunid' => 'mmol/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 7, 'medicame_id' => 8, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 0.5, 'ranhasta' => 5, 'rangunid' => 'mg / kg /min', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 8, 'medicame_id' => 9, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 0.5, 'ranhasta' => 5, 'rangunid' => 'mg / kg /min', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 9, 'medicame_id' => 10, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 4, 'rangunid' => 'mEq/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 10, 'medicame_id' => 11, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 4, 'rangunid' => 'mEq/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 11, 'medicame_id' => 12, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 400, 'ranhasta' => 1200, 'rangunid' => 'mg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 12, 'medicame_id' => 13, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 400, 'ranhasta' => 800, 'rangunid' => 'mg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 13, 'medicame_id' => 14, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 3.3, 'ranhasta' => 5, 'rangunid' => 'mcgZn/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 14, 'medicame_id' => 15, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 5, 'ranhasta' => 6.54, 'rangunid' => 'mcgZn/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 15, 'medicame_id' => 16, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 5, 'ranhasta' => 10, 'rangunid' => 'mcgZn/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 16, 'medicame_id' => 30, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 0.99, 'ranhasta' => 9.99, 'rangunid' => 'ml', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 17, 'medicame_id' => 18, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 0.099, 'ranhasta' => 0.99, 'rangunid' => ' mg Vit A/dia', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 18, 'medicame_id' => 20, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 0.4, 'ranhasta' => 1, 'rangunid' => 'mg/dia', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 19, 'medicame_id' => 21, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 500, 'ranhasta' => 1000, 'rangunid' => 'mg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 20, 'medicame_id' => 22, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 3, 'ranhasta' => 10, 'rangunid' => 'mL/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 21, 'medicame_id' => 23, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 500, 'ranhasta' => 1500, 'rangunid' => 'mg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 22, 'medicame_id' => 24, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 0.4, 'ranhasta' => 1, 'rangunid' => 'mg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 23, 'medicame_id' => 25, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 10, 'rangunid' => 'mg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 24, 'medicame_id' => 26, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 0.5, 'ranhasta' => 2, 'rangunid' => 'g/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 25, 'medicame_id' => 27, 'npt_id' => 3, 'sis_esta_id' => 1, 'randesde' => 0.5, 'ranhasta' => 2, 'rangunid' => 'g/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 26, 'medicame_id' => 3, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 4, 'rangunid' => 'g/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 27, 'medicame_id' => 5, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 1.5, 'rangunid' => 'mmol/Kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 28, 'medicame_id' => 7, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 1.5, 'rangunid' => 'mmol/Kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 29, 'medicame_id' => 8, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 4, 'ranhasta' => 18, 'rangunid' => 'mg / kg /min', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 30, 'medicame_id' => 9, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 4, 'ranhasta' => 18, 'rangunid' => 'mg / kg /min', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 31, 'medicame_id' => 10, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 4, 'rangunid' => 'mEq/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 32, 'medicame_id' => 11, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 4, 'rangunid' => 'mEq/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 33, 'medicame_id' => 12, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 100, 'ranhasta' => 350, 'rangunid' => 'mg/Kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 34, 'medicame_id' => 13, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 20, 'ranhasta' => 60, 'rangunid' => 'mg/Kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 35, 'medicame_id' => 17, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 40, 'ranhasta' => 400, 'rangunid' => 'mcg Zn++/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 36, 'medicame_id' => 17, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 250, 'ranhasta' => 250, 'rangunid' => 'mcg Zn++/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 37, 'medicame_id' => 19, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 920, 'ranhasta' => 920, 'rangunid' => ' UI Vit A/kg/dia', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 38, 'medicame_id' => 19, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 2300, 'ranhasta' => 2300, 'rangunid' => ' UI Vit A/kg/dia', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 39, 'medicame_id' => 20, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 56, 'ranhasta' => 56, 'rangunid' => 'mcg/kg/dia', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 40, 'medicame_id' => 20, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 140, 'ranhasta' => 140, 'rangunid' => 'mcg/kg/dia', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 41, 'medicame_id' => 24, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 0.4, 'ranhasta' => 1, 'rangunid' => 'mg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 42, 'medicame_id' => 25, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 10, 'rangunid' => 'mg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 43, 'medicame_id' => 26, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 0.5, 'ranhasta' => 2, 'rangunid' => 'g/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 44, 'medicame_id' => 27, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 0.5, 'ranhasta' => 2, 'rangunid' => 'g/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 45, 'medicame_id' => 28, 'npt_id' => 1, 'sis_esta_id' => 1, 'randesde' => 0.5, 'ranhasta' => 2, 'rangunid' => 'g/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 46, 'medicame_id' => 3, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 4, 'rangunid' => 'g/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 47, 'medicame_id' => 5, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 1.5, 'rangunid' => 'mmol/Kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 48, 'medicame_id' => 7, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 1.5, 'rangunid' => 'mmol/Kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 49, 'medicame_id' => 8, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 4, 'ranhasta' => 18, 'rangunid' => 'mg / kg /min', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 50, 'medicame_id' => 9, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 4, 'ranhasta' => 18, 'rangunid' => 'mg / kg /min', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 51, 'medicame_id' => 10, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 4, 'rangunid' => 'mEq/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 52, 'medicame_id' => 11, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 4, 'rangunid' => 'mEq/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 53, 'medicame_id' => 12, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 100, 'ranhasta' => 350, 'rangunid' => 'mg/Kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 54, 'medicame_id' => 13, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 20, 'ranhasta' => 60, 'rangunid' => 'mg/Kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 55, 'medicame_id' => 17, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 40, 'ranhasta' => 400, 'rangunid' => 'mcg Zn++/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 56, 'medicame_id' => 17, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 250, 'ranhasta' => 250, 'rangunid' => 'mcg Zn++/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 57, 'medicame_id' => 19, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 920, 'ranhasta' => 920, 'rangunid' => ' UI Vit A/kg/dia', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 58, 'medicame_id' => 19, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 2300, 'ranhasta' => 2300, 'rangunid' => ' UI Vit A/kg/dia', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 59, 'medicame_id' => 20, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 56, 'ranhasta' => 56, 'rangunid' => 'mcg/kg/dia', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 60, 'medicame_id' => 20, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 140, 'ranhasta' => 140, 'rangunid' => 'mcg/kg/dia', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 61, 'medicame_id' => 24, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 0.4, 'ranhasta' => 1, 'rangunid' => 'mg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 62, 'medicame_id' => 25, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 1, 'ranhasta' => 10, 'rangunid' => 'mg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 63, 'medicame_id' => 26, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 0.5, 'ranhasta' => 2, 'rangunid' => 'g/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 64, 'medicame_id' => 27, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 0.5, 'ranhasta' => 2, 'rangunid' => 'g/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
        Mnpt::create(['id' => 65, 'medicame_id' => 28, 'npt_id' => 2, 'sis_esta_id' => 1, 'randesde' => 0.5, 'ranhasta' => 2, 'rangunid' => 'g/kg/día', 'user_crea_id' => 1, 'user_edita_id' => 1,]);
    }
}
