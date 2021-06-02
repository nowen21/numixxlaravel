<?php

namespace App\Traits\Pdfs;

use App\Helpers\Cformula\Dataformulario;
use App\Helpers\Pdfs\Pdfs;
use App\Models\Formulaciones\Cformula;
use App\Models\Formulaciones\Orden;
use App\Models\Produccion\Calistam;
use App\Models\Produccion\ProPreplibe;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use App\Traits\Cformula\CalcularEdadTrait;
use App\User;

trait PdfTrait
{


    use CalcularEdadTrait;
    public function getImprimirPdf($dataxxxx)
    {
        $view = View::make($dataxxxx['vistaurl'], $dataxxxx['dataxxxx'])->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setPaper(
            $dataxxxx['dimensio'] //array(0, 0, 9.5 * 72, 14.9 * 72)
            ,
            "portrait"
        );

        if ($dataxxxx['tipoxxxx'] == 1) {
            return $pdf->stream($dataxxxx['nombarch']);
        }
        if ($dataxxxx['tipoxxxx'] == 2) {
            return $pdf->download($dataxxxx['nombarch'] . '.pdf');
        }
        if ($dataxxxx['tipoxxxx'] == 3) {
            return view($dataxxxx['vistaurl'], $dataxxxx['dataxxxx']);
        }
    }
    public function getQrCode($dataxxxx)
    {
        $cformula = $dataxxxx['dataxxxx']['cformula'];
        // $qrcodexx = 'NUTRICIÓN PARENTERAL ';
        $qrcodexx = 'LOTE No.: ' . $cformula->id ;
        $paciente = $cformula->paciente;
        $qrcodexx .= " N° AFILIACIÓN: {$paciente->cedula} , ";
        $qrcodexx .= "N° CAMA: {$paciente->cama}, ";
        $qrcodexx .= "SERVICIO: {$paciente->servicio->servicio}, ";
        $qrcodexx .= "NOMBRES Y APELLIDOS: {$paciente->nombres} {$paciente->apellidos}, ";
        $qrcodexx .= "PESO: {$paciente->peso}, ";

        $qrcodexx .= "VIA: $cformula->osmolarv, ";
        $qrcodexx .= "FECHA VENCIMIENTO: " . date("Y-m-d", strtotime(explode(' ', $cformula->created_at)[0] . "+ 2 days")) . ", ";
        $qrcodexx .= "CLÍNICA: {$cformula->sis_clinica->clinica->clinica}, ";
        $qrcodexx .= "NPT: {$paciente->npt->nombre}, ";
        $volutota = (float)$cformula->volumen + (float)$cformula->purga;
        $qrcodexx .= "VOLUMEN: {$volutota}, ";
        // foreach ($cformula->dformulas as $key => $value) {
        //     $qrcodexx .= "{$value->medicame->nombgene} - "
        //     . number_format($value->volumen, 2) . " - " . number_format($value->purga, 2) . ", ";
        // }
        // $qrcodexx .= "DURACIÓN {$cformula->tiempo}, ";
        // $qrcodexx .= "VELOCIDAD {$cformula->velocidad}, ";
        // $qrcodexx .= "FECHA PREPARACIÓN " . explode(' ', $cformula->created_at)[0] . ", ";
        // $qrcodexx .= "RELACIÓN: Caloría No proteícas/g Nitrógeno " . number_format($calculos['protnitr'], 2) . ", ";
        // $qrcodexx .= "OSMOLARIDAD " . number_format($calculos['osmolari'], 2) . ", ";
        // $qrcodexx .= "CALORÍAS TOTALES " . number_format($calculos['calotota'], 2) . ", ";
        // $qrcodexx .= "CALORÍA TOTAL/Kg/DÍA " . number_format($calculos['caltotkg'], 2) . ", ";
        // $qrcodexx .= "RELACIÓN CALCIO/FÓSFORO (<2 ) {$calculos['calcfosv']}, ";
        // $qrcodexx .= "PREPARADO POR: {$dataxxxx['dataxxxx']['preparad']}, ";
        // $qrcodexx .= "LIBERADO POR: {$dataxxxx['dataxxxx']['liberado']}";
        return $qrcodexx;
    }
    public function imprimirEtiquetaNpt($padrexxx)
    {

        $dataxxxx['cformula'] = Cformula::find($padrexxx);
        $dataxxxx['formular']  = Dataformulario::getPintarFormulario(
            [
                'paciente' => $dataxxxx['cformula']->paciente,
                'furmulac' => $dataxxxx['cformula'],
            ]
        );

        $dataxxxx['dnpxxxxx'] = $this->getCalcularDnp($dataxxxx['cformula']);
        $quimfarm = ProPreplibe::orderBy('created_at','asc')
        ->with([
            'userprep'=>function ($query) {
                // return $query->select('name','');
            },
            'userevis'=>function ($query) {
                // $query->select('name',);
            }
        ])
        ->first();

        if ($quimfarm == null && $dataxxxx['cformula']->userevis_id==null) {
            return redirect()
                ->route('revision', [])
                ->with('info', 'No se tiene un químico farmacéutico asignado');
        }

        $dataxxxx['preparad'] = $quimfarm->userprep->name;
        $dataxxxx['liberado'] = $quimfarm->userevis->name;
        $dataxxxx = [
            'vistaurl' => 'Reporte.Etiquetas.etiquetanpt',
            // 'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'dimensio' => [0, 0, 4.4 * 72, 6.4 * 72],
            'tipoxxxx' => 1,
            'nombarch' => 'etiqueta',
            'dataxxxx' => $dataxxxx,
        ];
        QrCode::size(80)->generate($this->getQrCode($dataxxxx), '../public/qrcodes/qrcode.svg');
        return $this->getImprimirPdf($dataxxxx);
    }
    public function imprimirLote($padrexxx)
    {
        $dataxxxx['cformula'] = Cformula::where('orden_id', $padrexxx)->get();
        $dataxxxx['vencimiento'] = '';
        $mayor = 0;
        $menor = 0;
        foreach ($dataxxxx['cformula'] as $key => $value) {
            $dataxxxx['vencimiento'] = date("Y-m-d", strtotime(explode(' ', $value->create_at)[0] . "+ 2 days"));
            if ($key == 0) {
                $menor = $value->id;
            }
            if ($key == count($dataxxxx['cformula']) - 1) {
                $mayor = $value->id;
            }
        }
        $dataxxxx['menor'] = $menor . '-' . $mayor;
        $dataxxxx['hoyxx'] = Carbon::today()->isoFormat('YYYY-MM-DD');
        $dataxxxx['userx'] = Auth::user()->name;
        $dataxxxx = [
            'vistaurl' => 'Reporte.Reporte.pdf.lote',
            'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'tipoxxxx' => 1,
            'nombarch' => 'Lote', $dataxxxx['hoyxx'],
            'dataxxxx' => $dataxxxx
        ];

        return $this->getImprimirPdf($dataxxxx);
    }


    public function getPdfConciliacion(Calistam $objetoxx)
    {
        $concilia = $this->getMlotesDlotesACT(['alisconc' => true, 'padrexxx' => $objetoxx]);
        // $concilia = $this->getConsiliacion(['padrexxx' => $objetoxx]);





        $dataxxxx = [
            'vistaurl' => $this->opciones['rutacarp'] . $this->opciones['carpetax'] . '.formulario.pdf.cabecera',
            'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'tipoxxxx' => 1,
            'nombarch' => 'conciliacion',
            'dataxxxx' => [
                'cabecera' => $objetoxx, 'todoxxxx' => ['alistami' => $concilia]
            ]
        ];
        return Pdfs::getImprimirPdf($dataxxxx);
    }

    public function getImprimirOrden(Orden $ordenxxx)
    {

        $formulac = Cformula::select(['cformulas.id', 'cformulas.created_at'])
            ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
            ->where('cformulas.orden_id', $ordenxxx->id)
            ->where('cformulas.terminado_id', '<>', null)
            // ->where('sis_clinicas.clinica_ide', $ordenxxx->clinica_id)
            ->get();
        if (isset($formulac[0])) {
            $dataxxxx = [
                'vistaurl' => 'Reporte.Orden.Formulario.ordenes',
                'dataxxxx' => [
                    'formulac' => $formulac,
                    'ordenxxx' => $ordenxxx->ordeprod,
                    'despejsi' => 'X',
                    'despejno' => '__',
                    'desponsi' => 'X',
                    'desponno' => '__'
                ],
                'dimensio' => 1,
                'tipoxxxx' => 1,
                'margenes' => array(0, 0, 9.5 * 72, 14.9 * 72),
                'nombarch' => 'ordenproduccion',
            ];
            return $this->getImprimirPdf($dataxxxx);
        } else {
            return redirect()->route('ordprodu')
                ->with('info', 'No hay formualaciones terminadas para la orden: ' . $ordenxxx->ordeprod);
        }
    }

    public function getRearmarArray($alistami)
    {
        $disposix = [];
        $medicamx = [];
        foreach ($alistami as $key => $value) {
            if ($value['value_di'] > 0) {
                $disposix[] =  [
                    "medicamd" => $value['medicamd'],
                    "value_di" => $value['value_di'],
                    "lotexxxd" => $value['lotexxxd'],
                    "reginvid" => $value['reginvid'],
                    "fechvend" => $value['fechvend'],
                    "dispo_id" => $value['dispo_id'],
                ];
            }
            if ($value['value_me'] > 0) {
                $medicamx[] = [
                    "medicamm" => $value['medicamm'],
                    "value_me" => $value['value_me'],
                    "lotexxxm" => $value['lotexxxm'],
                    "reginvim" => $value['reginvim'],
                    "fechvenm" => $value['fechvenm'],
                    "medic_id" => $value['medic_id'],
                ];
            }
        }
        $medicoun = count($medicamx);
        $dispcoun = count($disposix);
        $mayorxxx = [];
        if ($medicoun >= $dispcoun) {
            $mayorxxx = $medicamx;
        } else {
            $mayorxxx = $disposix;
        }
        $alistami = [];
        foreach ($mayorxxx as $key => $value) {
            $alistami[] = [
                "medicamd" => isset($disposix[$key]['medicamd']) ? $disposix[$key]['medicamd'] : '',
                "value_di" => isset($disposix[$key]['value_di']) ? $disposix[$key]['value_di'] : '',
                "lotexxxd" => isset($disposix[$key]['lotexxxd']) ? $disposix[$key]['lotexxxd'] : '',
                "reginvid" => isset($disposix[$key]['reginvid']) ? $disposix[$key]['reginvid'] : '',
                "fechvend" => isset($disposix[$key]['fechvend']) ? $disposix[$key]['fechvend'] : '',
                "dispo_id" => isset($disposix[$key]['dispo_id']) ? $disposix[$key]['dispo_id'] : '',
                "medicamm" => isset($medicamx[$key]['medicamm']) ? $medicamx[$key]['medicamm'] : '',
                "value_me" => isset($medicamx[$key]['value_me']) ? $medicamx[$key]['value_me'] : '',
                "lotexxxm" => isset($medicamx[$key]['lotexxxm']) ? $medicamx[$key]['lotexxxm'] : '',
                "reginvim" => isset($medicamx[$key]['reginvim']) ? $medicamx[$key]['reginvim'] : '',
                "fechvenm" => isset($medicamx[$key]['fechvenm']) ? $medicamx[$key]['fechvenm'] : '',
                "medic_id" => isset($medicamx[$key]['medic_id']) ? $medicamx[$key]['medic_id'] : '',
            ];
        }
        return $alistami;
    }
    public function getPdfCalistam(Calistam $objetoxx)
    {
        $dataxxxx = [
            'vistaurl' => 'Produccion.Alistamiento.pdf.alistami',
            'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'tipoxxxx' => 2,
            'nombarch' => 'alistamiento',
            'dataxxxx' => ['cabecera' => $objetoxx, 'detallex' =>  $this->opciones['alistami'] = $this->getMlotesDlotesACT(['alisconc' => true, 'padrexxx' => $objetoxx])]
        ];

        return Pdfs::getImprimirPdf($dataxxxx);
    }
}
