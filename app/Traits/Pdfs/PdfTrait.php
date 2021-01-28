<?php

namespace App\Traits\Pdfs;

use App\Helpers\Cformula\Dataformulario;
use App\Helpers\Pdfs\Pdfs;
use App\Helpers\Produccion\Alistamiento;
use App\Models\Formulaciones\Cformula;
use App\Models\Formulaciones\Orden;
use App\Models\Produccion\Calistam;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Traits\Cformula\CalculosTrait;
use App\Traits\Cformula\CalcularEdadTrait;
trait PdfTrait
{
    use CalculosTrait;
    use CalcularEdadTrait;
    public function getImprimirPdf($dataxxxx) {
        $view = View::make($dataxxxx['vistaurl'], $dataxxxx['dataxxxx'])->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setPaper($dataxxxx['dimensio']//array(0, 0, 9.5 * 72, 14.9 * 72)
            , "portrait");

        if ($dataxxxx['tipoxxxx'] == 1) {
          return $pdf->stream($dataxxxx['nombarch']);
        }
        if ($dataxxxx['tipoxxxx'] == 2) {
          return $pdf->download($dataxxxx['nombarch'].'.pdf');
        }
        if ($dataxxxx['tipoxxxx'] == 3) {
          return view($dataxxxx['vistaurl'], $dataxxxx['dataxxxx']);
        }
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
        //   QrCode::backgroundColor(255, 255, 0)->generate('Make me into a QrCode!', '../public/qrcodes/qrcode.svg');
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


      public function getPdfExpUsuarios(Calistam $objetoxx)
      {
          $dataxxxx = [
              'vistaurl' => 'Produccion.Alistamiento.pdf.alistami',
              'dimensio' => [0, 0, 9.5 * 72, 14.9 * 72],
              'tipoxxxx' => 1,
              'nombarch' => 'alistamientod',
              'dataxxxx' => ['cabecera' => $objetoxx, 'detallex' => Alistamiento::getMlotesDlotes($objetoxx->id)]
          ];
          return Pdfs::getImprimirPdf($dataxxxx);
      }

      public function getImprimirOrden(Orden $ordenxxx)
      {

        $formulac = Cformula::select(['cformulas.id','cformulas.created_at'])
        ->join('sis_clinicas', 'cformulas.sis_clinica_id', '=', 'sis_clinicas.id')
        ->where('cformulas.orden_id', $ordenxxx->id)
        ->where('cformulas.terminado_id','<>',null)
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
}
