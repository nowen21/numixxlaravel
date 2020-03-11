<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administracion\EpEditarRequest;
use App\Imports\DlotesImport;
use App\Imports\DmarcasImport;
use App\Imports\DmedicosImport;
use App\Imports\EpsImport;
use App\Imports\MinvimasImport;
use App\Imports\MlotesImport;
use App\Imports\MmarcasImport;
use App\Imports\MnptsImport;
use App\Imports\PacientesImport;
use App\Imports\SisClinicasImport;
use App\Models\Administracion\Ep;
use App\Models\Clinica\SisClinica;
use App\Models\Dispositivos\Dlote;
use App\Models\Dispositivos\Dmarca;
use App\Models\Dispositivos\Dmedico;
use App\Models\Medicamentos\Minvima;
use App\Models\Medicamentos\Mlote;
use App\Models\Medicamentos\Mmarca;
use App\Models\Medicamentos\Mnpt;
use App\Models\Pacientes\Pacientec;
use App\Models\Sistema\SisEsta;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'permisox' => 'excel',
            'parametr' => [],
            'rutacarp' => 'Administracion.Excel.',
            'tituloxx' => 'Subir: excel',
            'slotxxxx' => 'excel',
            'carpetax' => 'Excel',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' . $this->opciones['permisox'] . '-leer'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-crear'], ['only' => ['index', 'show', 'create', 'store', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-editar'], ['only' => ['index', 'show', 'edit', 'update', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-borrar'], ['only' => ['index', 'show', 'destroy']]);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'excel';
        $this->opciones['routnuev'] = 'excel';
        $this->opciones['routxxxx'] = 'excel';

        // $this->opciones['botoform'] = [
        //     [
        //         'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
        //         'formhref' => 2, 'tituloxx' => 'VOLVER A EPS', 'clasexxx' => 'btn btn-sm btn-primary'
        //     ],
        // ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->opciones['tablasxx'][] =
            [

                'titunuev' => 'NUEVA EPS',
                'titulist' => 'LISTA DE EPS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                ],
                'accitabl' => true,
                'vercrear' => true,
                'urlxxxxx' => 'api/administracion/eps',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'EPS'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'eps.id'],
                    ['data' => 'nombre', 'name' => 'eps.nombre'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablaeps',
                'permisox' => $this->opciones['permisox'],
                'parametr' => [],
                'routxxxx' => $this->opciones['routxxxx'],
            ];


        $this->opciones['padrexxx'] = '';

        $this->opciones['accionxx'] = 'index';
        return view($this->opciones['rutacarp'] . 'pestanias', ['todoxxxx' => $this->opciones]);
    }
    private function view($objetoxx, $nombobje, $accionxx, $vistaxxx)
    {
        $this->opciones['estadoxx'] = SisEsta::combo(['cabecera' => false, 'esajaxxx' => false]);
        $this->opciones['accionxx'] = $accionxx;
        // indica si se esta actualizando o viendo
        if ($nombobje != '') {
            $this->opciones[$nombobje] = $objetoxx;
        }
        // Se arma el titulo de acuerdo al array opciones
        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $magicosx = "'user_crea_id'=>1,
        'user_edita_id'=>1,
         'sis_esta_id'=>1";
        // foreach (Mmarca::get() as $marcasxx) {
        //  echo    "Mmarca::create(['id' => {$marcasxx->id}, 'nombcome' => '{$marcasxx->nombcome}', 'osmorali' => {$marcasxx->osmorali}, 'pesoespe' => {$marcasxx->pesoespe}, 
        // 'formfarm' => '{$marcasxx->formfarm}', 'medicame_id' => {$marcasxx->medicame_id}, 'marcaxxx' => '{$marcasxx->marcaxxx}', 'user_crea_id' => {$marcasxx->user_crea_id}, 
        // 'user_edita_id' => {$marcasxx->user_edita_id}, 'sis_esta_id' => {$marcasxx->sis_esta_id}]); <br>";
        // }


        // foreach (Minvima::get() as $marcasxx) {
        //     echo    "Minvima::create(['id'=>{$marcasxx->id},'reginvim'=>'{$marcasxx->reginvim}', 'mmarca_id'=>{$marcasxx->mmarca_id}, 
        //     'sis_esta_id'=>{$marcasxx->sis_esta_id}, 'user_crea_id'=>{$marcasxx->user_crea_id}, 'user_edita_id'=>{$marcasxx->user_edita_id}]); <br>";
        // }

        foreach (Mlote::get() as $marcasxx) {
            echo    "
            Mlote::create([
                'id'=>{$marcasxx->id},
                'fechvenc'=>'{$marcasxx->fechvenc}', 'minvima_id'=>{$marcasxx->minvima_id}, 
                'inventar'=>{$marcasxx->inventar}, 'lotexxxx'=>'{$marcasxx->lotexxxx}',
                {$magicosx}
            ]); <br>";
        }

        // foreach (SisClinica::get() as $marcasxx) {
        //    echo "SisClinica::create([
        //         'id'=>{$marcasxx->id},
        //         'nitxxxxx'=>'{$marcasxx->nitxxxxx}',
        //         'clinica'=>'{$marcasxx->clinica}',
        //         'telefono'=>'{$marcasxx->telefono}',
        //         'digiveri'=>{$marcasxx->digiveri},
        //         'user_crea_id'=>{$marcasxx->user_crea_id},
        //         'user_edita_id'=>{$marcasxx->user_edita_id},
        //         'sis_esta_id'=>{$marcasxx->sis_esta_id}
        //     ]); <br>";

        // }

        // foreach (Pacientec::get() as $marcasxx) {
        //     echo "Paciente::create([
        //         'id'=>{$marcasxx->id},
        //         'registro'=>{$marcasxx->registro},
        //         'cedula'=>'{$marcasxx->cedula}',
        //         'nombres'=>'{$marcasxx->nombres}',
        //         'apellidos'=>'{$marcasxx->apelldios}',
        //         'peso'=>{$marcasxx->peso},
        //         'genero_id'=>{$marcasxx->genero_id},
        //         'ep_id'=>{$marcasxx->ep_id},
        //         'cama'=>{$marcasxx->cama},
        //         'fechnaci'=>{$marcasxx->fechnaci},
        //         'departamento_id'=>{$marcasxx->departamento_id},
        //         'municipio_id'=>{$marcasxx->municipio_id},
        //         'npt_id'=>{$marcasxx->npt_id},
        //         'servicio_id'=>{$marcasxx->servicio_id},
        //         'sis_esta_id'=>{$marcasxx->sis_esta_id},
        //         'user_crea_id'=>{$marcasxx->user_crea_id},
        //         'sis_clinica_id'=>{$marcasxx->sis_clinica_id},
        //         'user_edita_id'=>{$marcasxx->user_edita_id},
        //     ]); <br>";
        // }

//         foreach (Dmedico::get() as $marcasxx) {
//             echo    "
//             Dmedico::create([
//                 'id'=>{$marcasxx->id},
//                 'nombrexx' => '{$marcasxx->nombrexx}',
//                 {$magicosx}
//             ]); <br>";
//         }
// echo '<br>marcas<br>';
//         foreach (Dmarca::get() as $marcasxx) {
//             echo    "
//             Dmarca::create([
//                 'id'=>{$marcasxx->id},
//                 'reginvim' => '{$marcasxx->reginvim}',
//                 'dmedico_id' => {$marcasxx->dmedico_id},
//                 'marcaxxx' => '{$marcasxx->marcaxxx}',
//                 {$magicosx}
//             ]); <br>";
//         }
//         echo '<br>lotes<br>';
        // foreach (Ep::get() as $marcasxx) {
        //     echo    "
        //     Ep::create([
        //         'id'=>{$marcasxx->id},
        //         'nombre' => '{$marcasxx->nombre}',
        //         {$magicosx}
        //     ]); <br>";
        // }

        // $this->opciones['padrexxx'] = '';
        // $this->opciones['indecrea'] = false;
        // $this->opciones['botoform'][] =
        //     [
        //         'mostrars' => true, 'accionxx' => 'SUBIR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
        //         'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
        //     ];
        // return $this->view(true, '', 'Crear', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $excelxxx = $request->file('excelxxx');

        // ddd($excelxxx);
        // Excel::import(new MmarcasImport, $excelxxx);
        // Excel::import(new MinvimasImport, $excelxxx);
        // Excel::import(new MlotesImport, $excelxxx);
        Excel::import(new EpsImport, $excelxxx);
        // Excel::import(new SisClinicasImport, $excelxxx);
        // $numeroxx=rand(1, 12);
        // echo $numeroxx.' '.($numeroxx<=10?12:11).'<br>';
        // echo str_pad($numeroxx, ($numeroxx<10?12:11), "0", STR_PAD_RIGHT );
        // Excel::import(new PacientesImport, $excelxxx);
        // Excel::import(new MnptsImport, $excelxxx);
        // Excel::import(new DmedicosImport, $excelxxx);
        //Excel::import(new DmarcasImport, $excelxxx);
        // Excel::import(new DlotesImport, $excelxxx);
        // $dataxxxx = $request->all();
        // return $this->grabar($dataxxxx, '', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ep $objetoxx)
    {
        $this->opciones['tituloxx'] = 'Ver: EPS';
        $this->opciones['indecrea'] = false;
        $this->opciones['padrexxx'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['readonly'] = 'readonly';
        return $this->view($objetoxx,  'modeloxx', 'Ver', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ep $objetoxx)
    {
        $this->opciones['tituloxx'] = 'Editar: EPS';
        $this->opciones['indecrea'] = false;
        $this->opciones['padrexxx'] = $objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'EDITAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx, $objectx, $infoxxxx)
    {
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [Ep::transaccion($dataxxxx, $objectx)->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EpEditarRequest  $request, Ep $objetoxx)
    {
        $dataxxxx = $request->all();
        return $this->grabar($dataxxxx, $objetoxx, 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ep $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }
}
