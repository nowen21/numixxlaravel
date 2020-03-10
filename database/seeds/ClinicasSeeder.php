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
        SisClinica::create(['id' => 1, 'nitxxxxx' => '17496705', 'clinica' => 'NUMIXX', 'telefono' => '12346789', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 2, 'nitxxxxx' => '900025914', 'clinica' => 'AMRITZAR S.A.', 'telefono' => '7910645', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 3, 'nitxxxxx' => '830090073', 'clinica' => 'ASOCIACION DE AMIGOS CONTRA EL CANCER - PROSEGUIR', 'telefono' => '5557080', 'digiveri' => 3, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 4, 'nitxxxxx' => '900094250', 'clinica' => 'BIO VIE S.A.S.', 'telefono' => '2530303', 'digiveri' => 2, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 5, 'nitxxxxx' => '830100595', 'clinica' => 'CENTRO DE INVESTIGACIONES DEL SISTEMA NERVIOSO LTD', 'telefono' => '3507122', 'digiveri' => 0, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 6, 'nitxxxxx' => '830099212', 'clinica' => 'CENTRO DE INVESTIGACIONES ONCOLOGICAS SAN DIEGO CI', 'telefono' => '3208400 EXT 404', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 7, 'nitxxxxx' => '900470909', 'clinica' => 'CENTRO HOSPITALARIO DEL META S.A.S.', 'telefono' => ' 3118056081', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 8, 'nitxxxxx' => '800169433', 'clinica' => 'CENTRO OFTALMOLOGICO OLSABE S.A.S.', 'telefono' => '6191669', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 9, 'nitxxxxx' => '901189770', 'clinica' => 'CER CLINICAL IPS S.A.S.', 'telefono' => '7426970', 'digiveri' => 3, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 10, 'nitxxxxx' => '83016163', 'clinica' => 'CLINICA CANDELARIA IPS S.A.S', 'telefono' => 'no tiene', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 11, 'nitxxxxx' => '846003067', 'clinica' => 'CLINICA CREAR VISION LTDA', 'telefono' => '4205336 EXT 122', 'digiveri' => 6, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 12, 'nitxxxxx' => '891856372', 'clinica' => 'CLINICA DE ESPECIALISTAS LTDA', 'telefono' => '3133597310', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 13, 'nitxxxxx' => '891001122', 'clinica' => 'CLINICA DE MONTERIA', 'telefono' => '3157840013', 'digiveri' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 14, 'nitxxxxx' => '892300979', 'clinica' => 'CLINICA DEL CESAR S.A.', 'telefono' => '3103686702', 'digiveri' => 9, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 15, 'nitxxxxx' => '891856161', 'clinica' => 'CLINICA EL LAGUITO S.A.', 'telefono' => '7703680 ext: 102', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 16, 'nitxxxxx' => '900328772', 'clinica' => 'CLINICA GENERAL DE LA 100 S.A.S.', 'telefono' => 'no tiene', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 17, 'nitxxxxx' => '900008328', 'clinica' => 'CLINICA INTEGRAL DE EMERGENCIAS LAURA DANIELA S.A.', 'telefono' => '5803535 EXT 110', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 18, 'nitxxxxx' => '900644884', 'clinica' => 'CLINICA LOS OCOBOS IPS S.A.S.', 'telefono' => '2762138', 'digiveri' => 2, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 19, 'nitxxxxx' => '813001952', 'clinica' => 'CLINICA MEDILASER S.A.', 'telefono' => '3176610945', 'digiveri' => 0, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 20, 'nitxxxxx' => '800247537', 'clinica' => 'CLINICA VASCULAR NAVARRA LTDA', 'telefono' => '3144167565', 'digiveri' => 6, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 21, 'nitxxxxx' => '830120157', 'clinica' => 'COLOMBIANA DE TRASPLANTES S.A.S.', 'telefono' => 'no tiene', 'digiveri' => 3, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 22, 'nitxxxxx' => '890981683', 'clinica' => 'CORPORACION DE FOMENTO ASISTENCIAL DEL HOSPITAL SA', 'telefono' => '3168457527', 'digiveri' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 23, 'nitxxxxx' => '900241765', 'clinica' => 'CUIDARTE TU SALUD S.A.S.', 'telefono' => '3847450 ext:2116', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 24, 'nitxxxxx' => '891800231', 'clinica' => 'E.S.E HOSPITAL SAN RAFAEL DE TUNJA', 'telefono' => '7405030', 'digiveri' => 0, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 25, 'nitxxxxx' => '820005389', 'clinica' => 'E.S.E. HOSPITAL REGIONAL DE CHIQUINQUIRA', 'telefono' => '3114527877', 'digiveri' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 26, 'nitxxxxx' => '891855438', 'clinica' => 'E.S.E. HOSPITAL REGIONAL DE DUITAMA', 'telefono' => '3102146162', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 27, 'nitxxxxx' => '890680025', 'clinica' => 'E.S.E. HOSPITAL SAN RAFAEL FUSAGASUGA', 'telefono' => '3134905971', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 28, 'nitxxxxx' => '830003564', 'clinica' => 'EPS FAMISANAR S.A.S', 'telefono' => '3185893826', 'digiveri' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 29, 'nitxxxxx' => '800227072', 'clinica' => 'EUSALUD S.A.', 'telefono' => '4320872 EXT 917', 'digiveri' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 30, 'nitxxxxx' => '900005955', 'clinica' => 'EVALUAMOS IPS LIMITADA', 'telefono' => '7848903 EXT 303', 'digiveri' => 6, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 31, 'nitxxxxx' => '900351322', 'clinica' => 'EVOLUCIA S.A.S.', 'telefono' => '7464516', 'digiveri' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 32, 'nitxxxxx' => '830084825', 'clinica' => 'FARMAMIX LTDA', 'telefono' => 'no tiene', 'digiveri' => 0, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 33, 'nitxxxxx' => '860006656', 'clinica' => 'FUNDACION ABOOD SHAIO', 'telefono' => '5938210', 'digiveri' => 9, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 34, 'nitxxxxx' => '812005522', 'clinica' => 'FUNDACION AMIGOS DE LA SALUD', 'telefono' => '3165328070', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 35, 'nitxxxxx' => '900540156', 'clinica' => 'FUNDACION CLINICA DEL RIO', 'telefono' => 'no tiene', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 36, 'nitxxxxx' => '800231038', 'clinica' => 'GARCIA PEREZ MEDICA Y COMPAÑÍA S.A.S.', 'telefono' => '2871949', 'digiveri' => 2, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 37, 'nitxxxxx' => '901034213', 'clinica' => 'GRUPO EMPRESARIAL VENUS S.A.', 'telefono' => '(038) 7710478', 'digiveri' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 38, 'nitxxxxx' => '800037021', 'clinica' => 'HOSPITAL DEPARTAMENTAL DE GRANADA E.S.E.', 'telefono' => '6587800', 'digiveri' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 39, 'nitxxxxx' => '891180098', 'clinica' => 'HOSPITAL DEPARTAMENTAL MARIA INMACULADA E.S.E', 'telefono' => '3107775144', 'digiveri' => 5, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 40, 'nitxxxxx' => '891800395', 'clinica' => 'HOSPITAL REGIONAL DE MONIQUIRA E.S.E', 'telefono' => '7282630', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 41, 'nitxxxxx' => '891855039', 'clinica' => 'HOSPITAL REGIONAL DE SOGAMOSO E.S.E', 'telefono' => '7702201', 'digiveri' => 9, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 42, 'nitxxxxx' => '900971406', 'clinica' => 'I.P.S. ARCASALUD S.A.S.', 'telefono' => '3147992189', 'digiveri' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 43, 'nitxxxxx' => '900657491', 'clinica' => 'I.P.S. BEST HOME CARE S.A.S.', 'telefono' => 'no tiene', 'digiveri' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 44, 'nitxxxxx' => '901049161', 'clinica' => 'ING CLINICAL CENTER SAS', 'telefono' => 'no tiene', 'digiveri' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 45, 'nitxxxxx' => '830095842', 'clinica' => 'INNOVAR SALUD S.A.S.', 'telefono' => '6098585', 'digiveri' => 3, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 46, 'nitxxxxx' => '900016598', 'clinica' => 'INSTITUTO CARDIVASCULAR DEL CESAR S.A.', 'telefono' => '5898632 EXT 364', 'digiveri' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 47, 'nitxxxxx' => '860007400', 'clinica' => 'INSTITUTO COLOMBIANO DEL SISTEMA NERVIOSO - CLINIC', 'telefono' => '2596000 ext: 6006', 'digiveri' => 5, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 48, 'nitxxxxx' => '892000401', 'clinica' => 'INVERSIONES CLINICA DEL META S.A.', 'telefono' => '6614400 EXT 1155', 'digiveri' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 49, 'nitxxxxx' => '900772776', 'clinica' => 'IPS SALUD MENTAL MONTE SINAI S.A.S', 'telefono' => 'no tiene', 'digiveri' => 3, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 50, 'nitxxxxx' => '900416861', 'clinica' => 'KUANSALUD S.A.S', 'telefono' => '4735197', 'digiveri' => 6, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 51, 'nitxxxxx' => '900529056', 'clinica' => 'MEDIFACA IPS S.A.S.', 'telefono' => '8439102', 'digiveri' => 9, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 52, 'nitxxxxx' => '813008574', 'clinica' => 'MEGASALUD IPS S.A.S.', 'telefono' => 'no tiene', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 53, 'nitxxxxx' => '860005114', 'clinica' => 'MESSER DE COLOMBIA S.A.', 'telefono' => '3123511070', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 54, 'nitxxxxx' => '900328323', 'clinica' => 'MIOCARDIO S.A.S. CASTELLANA', 'telefono' => '2095042', 'digiveri' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 55, 'nitxxxxx' => '900910031', 'clinica' => 'NACERSANO S.A.S.', 'telefono' => '8390668', 'digiveri' => 8, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 56, 'nitxxxxx' => '900879006', 'clinica' => 'NUEVA CLINICA DE SANTO TOMAS S.A.S.', 'telefono' => '3216551507', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 57, 'nitxxxxx' => '830109312', 'clinica' => 'NUMIXX SOCIEDAD POR ACCIONES SIMPLIFICADA SAS', 'telefono' => '6244487', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 58, 'nitxxxxx' => '111111111', 'clinica' => 'PROSPECTOS', 'telefono' => '6244487', 'digiveri' => 9, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 59, 'nitxxxxx' => '900536325', 'clinica' => 'PSQ S.A.S.', 'telefono' => '3193708091', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 60, 'nitxxxxx' => '830124110', 'clinica' => 'SALUD VITAL DE COLOMBIA IPS S.A.S.', 'telefono' => '6010569', 'digiveri' => 6, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 61, 'nitxxxxx' => '800162035', 'clinica' => 'SERVICIOS MEDICOS INTEGRALES DE SALUD S.A.S. SERVI', 'telefono' => '3017148620', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 62, 'nitxxxxx' => '900280825', 'clinica' => 'SOCIEDAD CLINICA CARDIOVASCULAR CORAZON JOVEN', 'telefono' => '8620909', 'digiveri' => 4, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 63, 'nitxxxxx' => '860400547', 'clinica' => 'SOCIEDAD DE ENFERMERAS PROFESIONALES S.A.S.', 'telefono' => '7420842 EXT 136', 'digiveri' => 3, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 64, 'nitxxxxx' => '800174851', 'clinica' => 'SOCIEDAD MEDICO QUIRURGICA NUESTRA SEÑORA DE BELEN', 'telefono' => '8866888', 'digiveri' => 1, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 65, 'nitxxxxx' => '900618967', 'clinica' => 'SOLUCIONES INTEGRALES AURUM MEDICAL S.A.S.', 'telefono' => '3004607', 'digiveri' => 5, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 66, 'nitxxxxx' => '900753563', 'clinica' => 'U+MOVIL CLINICAL ATTENTION GROUP IPS S.A', 'telefono' => 'no tiene', 'digiveri' => 0, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 67, 'nitxxxxx' => '800024744', 'clinica' => 'UNIDAD DE CIRUGIA DEL TOLIMA S.A.', 'telefono' => '2703232', 'digiveri' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 68, 'nitxxxxx' => '900343345', 'clinica' => 'UNIDAD DE SALUD Y CUIDADOS DE ALTOS RIESGOS SAS', 'telefono' => 'no tiene', 'digiveri' => 2, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 69, 'nitxxxxx' => '900601052', 'clinica' => 'UNIDAD PEDIATRICA SIMON BOLIVAR IPS S.A.S.', 'telefono' => '5821289', 'digiveri' => 7, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 70, 'nitxxxxx' => '830504734', 'clinica' => 'VISION TOTAL S.A.S.', 'telefono' => '3165274180', 'digiveri' => 2, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
        SisClinica::create(['id' => 71, 'nitxxxxx' => '40387750', 'clinica' => 'MORALES FLOREZ LUZ MERY', 'telefono' => 'no tiene', 'digiveri' => 2, 'user_crea_id' => 1, 'user_edita_id' => 1, 'sis_esta_id' => 1]);
    }
}
