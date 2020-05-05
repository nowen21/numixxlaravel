<?php

namespace App\Http\Controllers\Produccion;

use App\Helpers\Pdfs\Pdfs;
use App\Helpers\Produccion\Alistamiento;
use App\Http\Controllers\Controller;
use App\Http\Requests\Produccion\CalistamCrearRequest;
use App\Http\Requests\Produccion\CalistamEditarRequest;
use App\Models\Formulaciones\Ordene;
use App\Models\Produccion\Calistam;
use App\Models\Produccion\Dalistam;
use App\Models\Sistema\SisEsta;

class AlistamientoController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'cardhead'=>'ALISTAMIENTOS',
            'permisox' => 'alistami',
            'parametr' => [],
            'rutacarp' => 'Produccion.',
            'tituloxx' => 'Crear: Alistamiento',
            'slotxxxx'=>'alistami',
            'carpetax'=>'Alistamiento',
            'indecrea'=>false,
            'esindexx'=>false
        ];

        $this->middleware(['permission:' . $this->opciones['permisox'] . '-leer'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-crear'], ['only' => ['index', 'show', 'create', 'store', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-editar'], ['only' => ['index', 'show', 'edit', 'update', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-borrar'], ['only' => ['index', 'show', 'destroy']]);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'alistami';
        $this->opciones['routnuev'] = 'alistami';
        $this->opciones['routxxxx'] = 'alistami';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A ALISTAMIENTOS', 'clasexxx' => 'btn btn-sm btn-primary'
            ],
        ];
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $padrexxx='';
        $this->opciones['indecrea']=false;
        $this->opciones['esindexx']=true;
        $this->opciones['accionxx']='index';
        $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVO ALISTAMIENTO',
                'titulist' => 'LISTA DE ALISTAMIENTOS',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'medicame', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => true,
                'accitabl' => true,
                'urlxxxxx' => 'api/produccion/alistamiento',
                'cabecera' =>[
                    ['td' => 'ID'],
                    ['td' => 'PRODUCTO'],
                    ['td' => 'ORDEN DE SERVICIO'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'calistams.id'],
                    ['data' => 'producto', 'name' => 'calistams.producto'],
                    ['data' => 'ordepres', 'name' => 'calistams.ordepres'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablaordenes',
                'permisox' => 'alistami',
                'routxxxx' => 'alistami',
                'parametr' => [],
            ],

        ];
        $cabecera = Calistam::where('ordepres', Ordene::ordendia())->first();
        if(isset($cabecera->id)){
            $this->opciones['tablasxx'][0]['vercrear']=false;  
        }
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
        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $this->opciones['alistami']=Alistamiento::getMlotesDlotes(0);
        $this->opciones['indecrea']=false;
        $this->opciones['clinicac']=true;
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'CREAR', 'routingx' => [$this->opciones['routxxxx'] . '.editar', []],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        return $this->view(true, '', 'Crear', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalistamCrearRequest $request)
    {
        $dataxxxx = $request->all();
        $dataxxxx['ordepres']=Ordene::ordendia();
        return $this->grabar($dataxxxx, '', 'Alistamiento creado con éxito!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Calistam $objetoxx)
    {
        $this->opciones['alistami']=Alistamiento::getMlotesDlotes($objetoxx->id);
        $this->opciones['clinicax'] =$objetoxx->id;
        $this->opciones['parametr'] = [$objetoxx->id];
        // $this->opciones['botoform'][] =
        //     [
        //         'mostrars' => true, 'accionxx' => $objetoxx->sis_esta_id == 1 ? 'INACTIVAR' : 'ACTIVAR', 'routingx' => [$this->opciones['routxxxx'], []], 'formhref' => 1,
        //         'tituloxx' => '', 'clasexxx' => $objetoxx->sis_esta_id == 1 ? 'btn btn-sm btn-danger' : 'btn btn-sm btn-success'
        //     ];
        $this->opciones['readonly'] = 'readonly';
        return $this->view($objetoxx,  'modeloxx', 'Ver', $this->opciones['rutacarp'] . 'pestanias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Calistam $objetoxx)
    {
        $this->opciones['alistami']=Alistamiento::getMlotesDlotes($objetoxx->id);
        $this->opciones['clinicax'] =$objetoxx->id;
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
        $cabecera=Calistam::transaccion($dataxxxx, $objectx);
        Dalistam::transaccion($dataxxxx,  $cabecera);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$cabecera->id])
            ->with('info', $infoxxxx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CalistamEditarRequest  $request, Calistam $objetoxx)
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
    public function destroy(Calistam $objetoxx)
    {
        $this->opciones['parametr'] = [$objetoxx->id];

        $objetoxx->sis_esta_id = ($objetoxx->sis_esta_id == 2) ? 1 : 2;
        $objetoxx->save();
        $activado = $objetoxx->sis_esta_id == 2 ? 'inactivado' : 'activado';

        return redirect()->route($this->opciones['routxxxx'])->with('info', 'Registro ' . $activado . ' con éxito');
    }

    public function getPdfCalistam(Calistam $objetoxx)
    { 
        $dataxxxx = [
            'vistaurl' => 'Produccion.Alistamiento.pdf.alistami',
            'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'tipoxxxx' => 2,
            'nombarch' => 'alistamiento',
            'dataxxxx' => ['cabecera'=>$objetoxx,'detallex'=>Alistamiento::getMlotesDlotes($objetoxx->id)]
        ];
        return Pdfs::getImprimirPdf($dataxxxx);
    }
}
