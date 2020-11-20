<?php

namespace App\Http\Controllers\Reporte;

use App\Helpers\Cformula\Dataformulario;
use App\Helpers\Pdfs\Pdfs;
use App\Helpers\Produccion\Alistamiento;
use App\Http\Controllers\Controller;
use App\Models\Dispositivos\Dlote;
use App\Models\Formulaciones\Cformula;
use App\Models\Produccion\Calistam;
use App\Traits\Cformula\CalcularEdadTrait;
use App\Traits\Cformula\CalculosTrait;
use App\Traits\Pdfs\PdfTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    use CalculosTrait;
    use PdfTrait;
    use CalcularEdadTrait;

    public function getPdfExpUsuarios(Calistam $objetoxx)
    {
        $dataxxxx = [
            'vistaurl' => 'Produccion.Alistamiento.pdf.alistami',
            'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'tipoxxxx' => 1,
            'nombarch' => 'alistamiento',
            'dataxxxx' => ['cabecera' => $objetoxx, 'detallex' => Alistamiento::getMlotesDlotes($objetoxx->id)]
        ];
        return Pdfs::getImprimirPdf($dataxxxx);
    }

    public function imprimirEtiquetaNpt($padrexxx)
    {
        $dataxxxx['cformula']=Cformula::find($padrexxx);
        $dataxxxx['formular']  = Dataformulario::getPintarFormulario(
            [
                'paciente' => $dataxxxx['cformula']->paciente,
                'furmulac' =>$dataxxxx['cformula'],
            ]
        );

        $dataxxxx['calculos'] = $this->getCalculos($dataxxxx['cformula']);
        $dataxxxx['dnpxxxxx'] = $this->getCalcularDnp($dataxxxx['cformula']);

        $dataxxxx['preparad'] = isset($dataxxxx['cformula']->userprep);
        $dataxxxx['liberado'] = 'w';
        // ddd($dataxxxx['cformula']->paciente);
        $dataxxxx = [
            'vistaurl' => 'Reporte.Etiquetas.etiquetanpt',
            'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'tipoxxxx' => 1,
            'nombarch' => 'etiqueta',
            'dataxxxx' => $dataxxxx
        ];

        return $this->getImprimirPdf($dataxxxx);
    }

    public function imprimirLote($padrexxx)
    {
        $dataxxxx['cformula']=Cformula::where('orden_id',$padrexxx)->get();
        $dataxxxx['vencimiento']='';
        $mayor=0;
        $menor=0;
        foreach($dataxxxx['cformula'] as $key=>$value){
            $dataxxxx['vencimiento']=date("Y-m-d",strtotime(explode(' ',$value->create_at)[0]."+ 2 days"));
            if($key==0){
                $menor= $value->id;
            }
            if($key==count($dataxxxx['cformula'])-1){
                $mayor= $value->id;
            }
        }
        $dataxxxx['menor'] = $menor.'-'.$mayor;
        $dataxxxx['hoyxx']=Carbon::today()->isoFormat('YYYY-MM-DD');
        $dataxxxx['userx']=Auth::user()->name;
        $dataxxxx = [
            'vistaurl' => 'Reporte.Reporte.pdf.lote',
            'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
            'tipoxxxx' => 1,
            'nombarch' => 'Lote', $dataxxxx['hoyxx'],
            'dataxxxx' => $dataxxxx
        ];

        return $this->getImprimirPdf($dataxxxx);
    }

    
}
