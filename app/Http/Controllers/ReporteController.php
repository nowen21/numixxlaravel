<?php

namespace App\Http\Controllers;

use App\Formulacione;
use App\User;
use App\Ordene;
use App\Helpers\Calcularedad;
use App\Helpers\Dataformulario;

class ReporteController extends Controller {

  public function crearPDF($datos, $vistaurl, $tipo) {
    $dataform = new Dataformulario();
    $formular = $dataform->pintarformulario($datos->paciente,$datos->clinica, true, $datos, ['selectxx' => false, 'editarxx' => true]);
    $calculos = $dataform->calculos($datos);
    $dnpxxxxx = new Calcularedad;
    $dnpxxxxx = $dnpxxxxx->calculardnp($datos);
    $preparad = User::where('id', $datos->userprep)->first()->name;
    $liberado = User::where('id', $datos->userlibe)->first()->name;
    $servicio= \App\Servicio::
            join('paciente_servicio','servicios.id','=','paciente_servicio.servicio_id')
            ->where('servicios.clinica_id', $datos->clinica_id)
            //->where('paciente_servicio.estado_id', 1)
            ->where('paciente_servicio.paciente_id', $datos->paciente_id)
            ->first()->nombre;
    $data = $datos;
    $date = date('Y-m-d');
    $view = \View::make($vistaurl, compact('data', 'date', 'dnpxxxxx', 'liberado', 'preparad', 'calculos','servicio'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    $milimetr = 3.7795275591;
    $pdf->setPaper(array(0, 0, 100 * $milimetr, 150 * $milimetr), "portrait");
    if ($tipo == 1) {
      return $pdf->stream('reporte');
    }
    if ($tipo == 2) {
      return $pdf->download('reporte.pdf');
    }
    if ($tipo == 3) {
      return view($vistaurl, compact('data', 'dnpxxxxx', 'liberado'));
    }
  }

  //$dataxxxx=['vistaurl'=>'?','dataxxxx'=>'?','orientac'=>'?','tipoxxxx'=>'?','margenes'=>'?'];
  public function imprimir($dataxxxx) {
    $orientac = ['landscape', 'portrait']; // orientaciones del pdf
    $datosxxx = $dataxxxx['dataxxxx'];
    $view = \View::make($dataxxxx['vistaurl'], compact('datosxxx'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    $pdf->setPaper($dataxxxx['margenes'], $orientac[$dataxxxx['orientac']]);

    if ($dataxxxx['tipoxxxx'] == 1) {
      return $pdf->stream('reporte');
    }
    if ($dataxxxx['tipoxxxx'] == 2) {
      return $pdf->download('reporte.pdf');
    }
    if ($dataxxxx['tipoxxxx'] == 3) {
      return view($dataxxxx['vistaurl'], compact('datosxxx'));
    }
  }

  public function etiqueta(Formulacione $formulacione, $tipo) {
    $respuest = true;
    $tipo = 3;
    $vistaurl = 'reportes.veretiqueta';
    if (auth()->user()->clinica_id == 1) {
      $vistaurl = "reportes.etiqueta";
      $respuest = false;
      $tipo = 1;
    }
    if ($formulacione->userprep > 0 && $formulacione->userproc > 0 && $formulacione->userlibe > 0) {
      return $this->crearPDF($formulacione, $vistaurl, $tipo);
    } else {
      return redirect()->route('npt.index')
                      ->with('info', 'El lote: ' . $formulacione->id . ' todavÃ­a no ha sido liberado');
    }
  }

  public function conciliacion(Formulacione $formulacione, $tipo) {
    $vistaurl = "reportes.etiqueta";
    return $this->crearPDF($formulacione, $vistaurl, $tipo);
  }

  public function controles(Ordene $ordene) {
    $liberado = [];
    $preparad = [];
    $pintarxy = [];

    $liberadx = '';
    $preparax = '';
    $todosxxx = \App\Itemordene::all();
    $formulac = Formulacione::where('ordeprod', $ordene->ordeprod)->where('userlibe', '>', 0)->where('userproc', '>', 0)->where('userprep', '>', 0)->get();
    $valorxxy = count($formulac);
    if ($valorxxy > 0) {
      foreach ($formulac as $key => $value) {
        if (!in_array($value->userlibe, $liberado)) {
          $liberado[] = $value->userlibe;
          $liberadx .= User::where('id', $value->userlibe)->first()->name;
        }
        if (!in_array($value->userprep, $preparad)) {
          $preparad[] = $value->userprep;
          $preparax .= User::where('id', $value->userprep)->first()->name;
        }
        $formular[$key] = $value->id;
        if ($valorxxy <= 38) {
          if ($valorxxy == $key + 1) {
            $pintarxy[] = ['pintarxx' => '', 'formular' => $formular, 'otrapagi' => 0, 'userprep' => $preparax, 'userlibe' => $liberadx];
          }
        } else {
          if (38 == $key + 1) {
            $pintarxy[] = ['pintarxx' => '', 'formular' => $formular, 'otrapagi' => 1, 'userprep' => $preparax, 'userlibe' => $liberadx];
            $formular = [];
            $preparax = '';
            $liberadx = '';
          }
        }
      }
      foreach ($pintarxy as $key => $pintarxx) {
        $pintarxy[$key]['pintarxx'] = $todosxxx;
        foreach (\App\Itemordene::all() as $keypintar => $value) {
          $valorxxx = [];
          if ($value->colspanx == 0) {
            for ($i = 0; $i < 38; $i++) {
              if ($i < count($pintarxx['formular'])) {
                if ($keypintar == 0) { // lotes
                  $valorxxx[$i] = ['valorxxx' => $pintarxx['formular'][$i], 'clasexxx' => 'verticalText'];
                } else {// las otras opciones (procesos y treminados)
                  switch ($value->aplicaxx) {
                    case 1:
                      $valorxxx[$i] = ['valorxxx' => $this->procesos($formular, $value->campoxxx), 'clasexxx' => ''];
                      break;
                    case 2:
                      $valorxxx[$i] = ['valorxxx' => $this->terminados($pintarxx['formular'][$i], $value->campoxxx), 'clasexxx' => ''];
                      break;
                  }
                }
              } else
                $valorxxx[$i] = ['valorxxx' => 'X', 'clasexxx' => ''];
            }
            $todosxxx[$keypintar]['validado'] = $valorxxx;
          }
        }
      }
      $dataxxxx = ['vistaurl' => 'reportes.controles', 'dataxxxx' => ['ordenxxx' => $ordene, 'formular' => $pintarxy], 'orientac' => 0, 'tipoxxxx' => 1, 'margenes' => array(0, 0, 9.5 * 72, 14.9 * 72)];
      return $this->imprimir($dataxxxx);
    }else {
      return redirect()->route('controles.index')
                      ->with('info', 'No hay formualaciones terminadas para la orden: ' . $ordene->ordepres);
    }
  }

  public function ordenes($ordene) {
    $formulac = Formulacione::where('ordeprod', $ordene)->where('userlibe', '>', 0)->where('userproc', '>', 0)->where('userprep', '>', 0)->get();
    if (count($formulac) > 0) {
      $dataxxxx = ['vistaurl' => 'reportes.ordenes', 'dataxxxx' => ['formulac' => $formulac, 'ordenxxx' => $ordene, 'despejsi' => 'X', 'despejno' => '__', 'desponsi' => 'X', 'desponno' => '__'], 'orientac' => 1, 'tipoxxxx' => 1];
      return $this->imprimir($dataxxxx);
    } else {
      return redirect()->route('ordenes.index')
                      ->with('info', 'No hay formualaciones terminadas para la orden: ' . $ordene);
    }
  }

  private function procesos($formular, $campoxxx) {
    $procesos = \App\Proceso::select($campoxxx)->where('formulacione_id', $formular)->first()[$campoxxx];
    switch ($campoxxx) {
      case 'ausepart':
      case 'ausefuga':
      case 'ausemise':
      case 'coloraci':
        if ($procesos == 1) {
          $procesos = 'SI';
        }
        break;
    }
    return $procesos;
  }

  private function terminados($formular, $campoxxx) {
    $valorxxx = \App\Terminado::where('proceso_id', \App\Proceso::select('id')->where('formulacione_id', $formular)->first()['id'])->first()[$campoxxx];

    switch ($campoxxx) {
      case 'completo':
      case 'particul':
      case 'integrid':
      case 'contenid':
      case 'fugasxxx':
      case 'miscelas':
      case 'burbujas':
      case 'document':
        if ($valorxxx == 1) {
          $valorxxx = 'SI';
        }
        break;
    }
    return $valorxxx;
  }

  public function remision(\App\Remisione $remisione) {
    
    foreach (Formulacione::where('ordeprod', $remisione->ordeprod)->get() as $value) {
     $medicame = ['lipidoxx'=>'Sin Lípidos','glutamin'=>'Sin Glutamina'];
      foreach ($value->formulacionmeds as $formedic) {
        if($formedic->medicamento->casa_id==16){
          $medicame['lipidoxx']='Con Lípido '.$formedic->purga;
        }
        if($formedic->medicamento->casa_id==10){
          $medicame['glutamin']='Con Glutamina '.$formedic->purga;
        }
      }
      
      $formulac[] = [
          'paciente' => [
              'nombrexx' => $value->paciente->nombres . ' ' . $value->paciente->apellidos,
              'document' => $value->paciente->cedula,
              'nptxxxxx' => $value->paciente->npt->nombre,
          ],
          'volumenx' => $value->total,
          'medicame' => $medicame,
          'lotexxxx' => $value->total,
          'quimicox' => $value->id,
      ];
    }
    $dataxxxx = [
        'vistaurl' => 'reportes.remision',
        'dataxxxx' => [
            'clinicax' => [
                'nombrexx' => $remisione->clinica_rango->clinica->nombre,
                'direccio' => $remisione->clinica_rango->clinica->direccio,
                'telefono' => $remisione->clinica_rango->clinica->telefono
            ],
            'fechaxxx' => explode(' ', $remisione->created_at)[0],
            'formulac' => $formulac,
        ],
        'orientac' => 1,
        'tipoxxxx' => 1,
        'margenes' => array(0, 0, 9.5 * 72, 14.9 * 72)];
//    echo '<pre>';
//    print_r($dataxxxx);
    return $this->imprimir($dataxxxx);
  }

}
