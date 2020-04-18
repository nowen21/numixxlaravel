<?php

namespace App\Http\Controllers\Produccion;

use App\Helpers\Produccion\Alistamiento;
use App\Helpers\Produccion\Conciliacion;
use App\Http\Controllers\Controller;
use App\Http\Requests\Produccion\ConciliacionCrearRequest;
use App\Http\Requests\Produccion\ConciliacionEditarRequest;
use App\Models\Formulaciones\Ordene;
use App\Models\Produccion\Calistam;
use App\Models\Produccion\Dalistam;
use App\Models\Sistema\SisEsta;
use Illuminate\Http\Request;

class ConciliacionController extends Controller
{
    private $opciones;

    public function __construct()
    {
        $this->opciones = [
            'cardhead'=>'CONCILIACIONES',
            'permisox' => 'concilia',
            'parametr' => [],
            'rutacarp' => 'Produccion.',
            'tituloxx' => 'Crear: Conciliación',
            'slotxxxx'=>'concilia',
            'carpetax'=>'Conciliacion',
            'indecrea'=>false,
            'esindexx'=>false
        ];

        $this->middleware(['permission:' . $this->opciones['permisox'] . '-leer'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-crear'], ['only' => ['index', 'show', 'create', 'store', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-editar'], ['only' => ['index', 'show', 'edit', 'update', 'view', 'grabar']]);
        $this->middleware(['permission:' . $this->opciones['permisox'] . '-borrar'], ['only' => ['index', 'show', 'destroy']]);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'concilia';
        $this->opciones['routnuev'] = 'concilia';
        $this->opciones['routxxxx'] = 'concilia';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A CONCILIACIONES', 'clasexxx' => 'btn btn-sm btn-primary'
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
                'titunuev' => 'NUEVA CONCILIACION',
                'titulist' => 'LISTA DE CONCILIACIONES',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadoxx'],
                    ['campoxxx' => 'medicame', 'dataxxxx' => $padrexxx],
                ],
                'vercrear' => false,
                'accitabl' => true,
                'urlxxxxx' => 'api/produccion/conciliaciones',
                'cabecera' =>[
                    ['td' => 'ID'],
                    ['td' => 'PRODUCTO'],
                    ['td' => 'FECHA'],
                    ['td' => 'OP'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'calistams.id'],
                    ['data' => 'producto', 'name' => 'calistams.producto'],
                    ['data' => 'created_at', 'name' => 'calistams.created_at'],
                    ['data' => 'ordepres', 'name' => 'calistams.ordepres'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablaordenes',
                'permisox' => 'concilia',
                'routxxxx' => 'concilia',
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Calistam $objetoxx)
    {
        $this->opciones['tituloxx'] = 'Ver: Conciliación';
        $this->opciones['alistami']=Conciliacion::getMlotesDlotes($objetoxx->id);
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
        $this->opciones['alistami']=Conciliacion::getMlotesDlotes($objetoxx->id);
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
    public function update(ConciliacionEditarRequest  $request, Calistam $objetoxx)
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

    public function esnumerico(Request $request) {
        if ($request->ajax()) {
          $data = $request->all();
          $numeroxx = $data['cantcons'];
          if (!is_numeric($data['cantcons'])) {// se verifica que sea un volor numerico lo que se ingrese
            if ($data['cantcons'] != '') {
              $numeroxx = substr($numeroxx, 0, strlen($numeroxx) - 1);
            } else {
              $numeroxx = 0;
            }
          }
          $cantmayo = false;
          if ($numeroxx > $data['cantalis']) {
            $cantmayo = true;
          }
    
          $idelemen = $data['idcancon'][0] . '_' . $data['idcancon'][1];
          return response()->json([
                      'numeroxx' => $numeroxx,
                      'diferenc' => $data['cantalis'] - $numeroxx,
                      'cantalis' => $data['cantalis'],
                      'idcancon' => $idelemen . '_con',
                      'idiferen' => $idelemen . '_dif',
                      'cantmayo' => $cantmayo
          ]);
        }
      }
}
