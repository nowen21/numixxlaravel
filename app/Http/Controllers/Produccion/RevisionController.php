<?php

namespace App\Http\Controllers\Produccion;

use App\Helpers\Cformula\Dataformulario;
use App\Http\Controllers\Controller;
use App\Http\Requests\Produccion\RevisionEditarRequest;
use App\Models\Formulaciones\Cformula;
use App\Models\Sistema\SisEsta;
use App\Traits\Alertas\AlertasTrait;
use App\Traits\Pestanias\ProduccionTrait;
use App\Traits\Produccion\InventarioTrait;
use Illuminate\Support\Facades\Auth;

class RevisionController extends Controller
{
    private $opciones;
    use ProduccionTrait;
    use InventarioTrait;
    use AlertasTrait;
    public function __construct()
    {
        $this->opciones = [
            'cardhead' => 'Revisión Formulación',
            'permisox' => 'revision',
            'parametr' => [],
            'rutacarp' => 'Produccion.',
            'tituloxx' => 'Crear: Formulación',
            'slotxxxx' => 'revision',
            'carpetax' => 'Revision',
            'indecrea' => false,
            'esindexx' => false
        ];

        $this->middleware(['permission:' .
            $this->opciones['permisox'] . '-leer|' .
            $this->opciones['permisox'] . '-crear|' .
            $this->opciones['permisox'] . '-editar|' .
            $this->opciones['permisox'] . '-borrar']);

        $this->opciones['readonly'] = '';
        $this->opciones['rutaxxxx'] = 'revision';
        $this->opciones['routnuev'] = 'revision';
        $this->opciones['routxxxx'] = 'revision';

        $this->opciones['botoform'] = [
            [
                'mostrars' => true, 'accionxx' => '', 'routingx' => [$this->opciones['routxxxx'], []],
                'formhref' => 2, 'tituloxx' => 'VOLVER A FORMULACIONES', 'clasexxx' => 'btn btn-sm btn-primary'
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

        $this->opciones['paciente'] = '';
        // $this->opciones['botoform'][0]['routingx'][1] = $padrexxx;
        $this->opciones['indecrea'] = false;
        $this->opciones['esindexx'] = false;
        $this->opciones['accionxx'] = 'index';
        // $this->opciones['padrexxx'] = $padrexxx;
        $this->opciones['parametr'] = [];
        $this->opciones['tablasxx'] = [
            [
                'titunuev' => 'NUEVA FORMULACIóN',
                'titulist' => 'LISTA DE FORMULACIONES',
                'dataxxxx' => [
                    ['campoxxx' => 'botonesx', 'dataxxxx' =>
                    $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.botonesapi'],
                    ['campoxxx' => 'revisado', 'dataxxxx' =>
                    $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.botones.revisado'],
                    ['campoxxx' => 'estadoxx', 'dataxxxx' => 'layouts.components.botones.estadosx'],
                ],
                'vercrear' => false,
                'accitabl' => true,
                'urlxxxxx' => 'api/produccion/produccion',
                'cabecera' => [
                    ['td' => 'ID'],
                    ['td' => 'TIEMPO INFUSION'],
                    ['td' => 'VELOCIDAD INFUSION'],
                    ['td' => 'VOLUMEN'],
                    ['td' => 'PURGA'],
                    ['td' => 'PESO'],
                    ['td' => 'REVISADO'],
                    ['td' => 'ESTADO'],
                ],
                'columnsx' => [
                    ['data' => 'botonexx', 'name' => 'botonexx'],
                    ['data' => 'id', 'name' => 'cformulas.id'],
                    ['data' => 'tiempo', 'name' => 'cformulas.tiempo'],
                    ['data' => 'velocidad', 'name' => 'cformulas.velocidad'],
                    ['data' => 'volumen', 'name' => 'cformulas.volumen'],
                    ['data' => 'purga', 'name' => 'cformulas.purga'],
                    ['data' => 'peso', 'name' => 'cformulas.peso'],
                    ['data' => 'revisado', 'name' => 'revisado'],
                    ['data' => 's_estado', 'name' => 'sis_estas.s_estado'],
                ],
                'tablaxxx' => 'tablaformulaciones',
                'permisox' => 'revision',
                'routxxxx' => 'revision',
                'parametr' => [],
            ],

        ];
        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => ''
        ]);
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
        $this->opciones['pestania'] = $this->getPestanias([
            'tablaxxx' => $this->opciones['routxxxx'], 'padrexxx' => ''
        ]);
        // Se arma el titulo de acuerdo al array opciones
        return view($vistaxxx, ['todoxxxx' => $this->opciones]);
    }


    public function edit(Cformula $objetoxx)
    {


        $this->opciones['tituloxx'] = 'Revisar: Formulación';


        $paciente = $objetoxx->paciente;

        $this->opciones['cardhead'] = $this->opciones['cardhead'] . ' Paciente: ' . $paciente->nombres . ' ' . $paciente->apellidos;

        $this->opciones['formular'] = Dataformulario::getPintarFormulario(
            [
                'paciente' => $paciente,
                'furmulac' => $objetoxx,

            ]
        );
        $this->opciones['paciente'] = $paciente;

        $this->opciones['parametr'] = [$objetoxx->id];
        /**
         * solo se puede modificar la revision si la conciliacion no se ha realizado
         */

        // if ($objetoxx->userevis_id == 0) {
        $this->opciones['botoform'][] =
            [
                'mostrars' => true, 'accionxx' => 'LISTO', 'routingx' => [$this->opciones['routxxxx'] . '.editar', [$objetoxx->id]],
                'formhref' => 1, 'tituloxx' => '', 'clasexxx' => 'btn btn-sm btn-primary'
            ];
        // }

        return $this->view($objetoxx,  'modeloxx', 'Editar', $this->opciones['rutacarp'] . 'pestanias');
    }

    private function grabar($dataxxxx)
    {
        $cformula = $dataxxxx['objetoxx']->update($dataxxxx['dataxxxx']);

        $this->getDescontarInventario(['cformula' => $dataxxxx['objetoxx']]);
        return redirect()
            ->route($this->opciones['routxxxx'] . '.editar', [$dataxxxx['objetoxx']->id])
            ->with('info', $dataxxxx['infoxxxx']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RevisionEditarRequest  $request, Cformula $objetoxx)
    {
        $this->getAlerta(['objetoxx'=>$objetoxx,'tipoacci'=>3]);
        $dataxxxx = ['userevis_id' => Auth::user()->id, 'user_edita_id' => Auth::user()->id];
        return $this->grabar(['dataxxxx' => $dataxxxx, 'objetoxx' => $objetoxx, 'infoxxxx' => 'Se ha realizado la revisión con éxito']);
    }
}
