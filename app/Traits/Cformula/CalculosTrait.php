<?php

namespace App\Traits\Cformula;

use App\Helpers\Cformula\Casas;

trait CalculosTrait
{
    use PintarFormularioTrait;
    use CalculosPediatricosTrait;
    use CalculosAdultosTrait;
    /**
     * Calcular osmolaridad y peso especifico por lote
     *
     * @access private
     * @param $formlote lotes que tiene la formulacion medica
     */
    private function osmolaridadypesoespecifico($formlote)
    {
        $osmolari = 0;
        $pesoespe = 0;
        $purgaxxx = $formlote->purga;
        $volumenx = $formlote->volumen; // volumen consumido por cada lote


        // recorrer cada uno de los lotes los que se le desconto el volumen de la formulacion medica
        foreach ($formlote->medicame->mmarcas as $key => $lotexxxx) {
            $osmolari += $volumenx / $purgaxxx * $lotexxxx->osmorali; //osmolaridad por cada uno de los lotes
            $pesoespe += $volumenx / $purgaxxx * $lotexxxx->pesoespe; // peso especifico por cada uno de los lotes
        }
        return ['osmolari' => $formlote->medicame->mmarcas->first(), 'pesoespe' => $pesoespe];
    }
    /**
     * Armar datasxxx con con cada una de las formulaciones medicas de la fomulacion
     *
     * @access public
     * @param $furmulac fomulacion que arma datasxxx
     */
    private function getDataCasaCT($dataxxxx)
    {
        return [
            'casaxxxx' => $dataxxxx['dformula']->medicame->casa->nombre, // nombre de la casa
            'selevalu' => $dataxxxx['dformula']->medicame_id, // id casa seleccionada
            'requerim' => $dataxxxx['dformula']->rtotal, // requrimiento total del medicame
            'requtota' => $dataxxxx['dformula']->cantidad, // cantidad digitada
            'volumenx' => $dataxxxx['dformula']->volumen, // volumen del medicame solicitado
            'nombgene' => $dataxxxx['dformula']->medicame->nombgene // nombre del medicame
        ];
    }
    private function armardata($cabecera)
    {
        $formulacion = ['osmolari' => 0, 'pesoespe' => 0];
        // recorrer cada una de las formulaciones medicas
        foreach ($cabecera->dformulas as $key => $dformula) {
            $marcaxxx = $dformula->medicame
                ->mmarcas()->select(['osmorali', 'pesoespe'])
                ->first();
            $formulacion[$dformula->medicame->casa_id] = $this->getDataCasaCT(['dformula' => $dformula]);
            // if ($cabecera->userevis_id) {
            // $osmopeso = $this->osmolaridadypesoespecifico($dformula);
            $formulacion['osmolari'] += $marcaxxx->osmorali * $dformula->purga; // calcular la osmolarida
            $formulacion['pesoespe'] += $marcaxxx->pesoespe * $dformula->purga; // calcular el peso específico
            // }
        }
        return $formulacion;
    }
    private function casaCT($idcasaxx, $datasxxx)
    {
        $casasxxx = new Casas();
        $requtota = 0;
        $medicame = $datasxxx[$idcasaxx];
        switch ($idcasaxx) {
            case 1: // casa de los aminoacidos
                $requtota = $casasxxx->aminoacidos($medicame, $datasxxx);
                break;
            case 2: // casa de los fosfatos
                $requtota = $casasxxx->fosfatos($medicame, $datasxxx);
                break;
            case 3: // casa carbohidratos
                $requtota = $casasxxx->carbohidratos($medicame, $datasxxx);
                break;
            case 16: // casa lipidos
                $requtota = $casasxxx->lipidos($medicame, $datasxxx);
                break;
        }
        return $requtota;
    }
    public function getCalculosCT($cabecera)
    {
        $datasxxx = $this->armardata($cabecera);
        $this->_dataxxx['volutota'] = $cabecera->volumen; //volumen total
        $this->_dataxxx['veloinfu'] = $cabecera->velocidad; //velocidad de infusion
        $this->_dataxxx['pesoxxxx'] = $cabecera->peso; //velocidad de infusion
        $this->_dataxxx['velopurg'] = $cabecera->volumen + $cabecera->purga; //velocidad de infusion
        if ($cabecera->paciente->npt_id == 3) { // adultos
            $this->_dataxxx = $this->calculosadultosCAT($this->_dataxxx, $datasxxx);
        } else { // neonato y pediatrico
            $this->_dataxxx = $this->calculosneopediatricoCPT($this->_dataxxx, $datasxxx);
        }
        $this->_dataxxx['carbvali'] = $this->_dataxxx['concarbo'] > 24.5 ? 'ADVER/R.H�?GADO GRASO' : ($this->_dataxxx['concarbo'] < 24.4 ? 'SEGURA' : '');
        $this->_dataxxx['concprov'] = $this->_dataxxx['concprot'] < 1 ? 'NO ESTABLE' : 'ESTABLE';
        $this->_dataxxx['conclipv'] = ($this->_dataxxx['conclipi'] < 1 && $this->_dataxxx['conclipi'] != 0) ? 'NO ESTABLE' : 'ESTABLE';
        $this->_dataxxx['osmolari'] = $datasxxx['osmolari'] / $this->_dataxxx['velopurg']; //OSMOLARIDAD (mOsm / L)
        $this->_dataxxx['osmolarv'] = $this->_dataxxx['osmolari'] > 700 ? 'VIA CENTRAL' : 'VIA PERIFÉRICA';
        $this->_dataxxx['calcfosv'] = $this->_dataxxx['calcfosf'] < 2 ? 'SEGURA' : 'NO SEGURA';
        $this->_dataxxx['calototv'] = $this->_dataxxx['calotota'] / $this->_dataxxx['calotota'] * 100;
        $this->_dataxxx['calocarv'] = $this->_dataxxx['calocarb'] / $this->_dataxxx['calotota'] * 100;
        $this->_dataxxx['calolipv'] = $this->_dataxxx['calolipi'] / $this->_dataxxx['calotota'] * 100;
        $this->_dataxxx['caloprov'] = $this->_dataxxx['caloprot'] / $this->_dataxxx['calotota'] * 100;
        $this->_dataxxx['pesoteor'] = $datasxxx['pesoespe']; //PESO TEORICO  (GRAMOS)
        return $this->_dataxxx;
    }
}
