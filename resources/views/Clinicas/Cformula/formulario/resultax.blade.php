<div id="formulaciontable">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-lg-6 table-bordered form-control">VOLUMEN TOTAL (ml)</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="volutota" style="text-align: right;"> {{$todoxxxx['calculos']['volutota']}} </div>
        <div class="col-xs-4 col-sm-4 col-lg-4 table-bordered form-control"> VOLUMEN CON PURGA (ml)</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="velopurg" style="text-align: right;"> {{$todoxxxx['calculos']['velopurg']}} </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-lg-6 table-bordered form-control">VELOCIDAD DE INFUSIÓN (ml/hora)</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="veloinfu" style="text-align: right;">{{$todoxxxx['calculos']['veloinfu']}} </div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control">CONCENTRACIÓN DE CARBOHIDRATOS (%)</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="carbvali">{{$todoxxxx['calculos']['carbvali']}}</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="concarbo" style="text-align: right;">{{$todoxxxx['calculos']['concarbo']}}</div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control">CONCENTRACIÓN DE PROTEÍNA (%) (>1%)</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="concprov">{{$todoxxxx['calculos']['concprov']}}</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="concprot" style="text-align: right;">{{$todoxxxx['calculos']['concprot']}}</div>
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control" class="align-bottom"> VÍA DE ADMINISTRACIÓN</div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control">CONCENTRACIÓN DE LÍPIDOS (%) (>1%)</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="conclipv">{{$todoxxxx['calculos']['conclipv']}}</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="conclipi" style="text-align: right;">{{$todoxxxx['calculos']['conclipi']}}</div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-lg-6 table-bordered form-control">OSMOLARIDAD (mOsm/L)</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="osmolari" style="text-align: right;">{{$todoxxxx['calculos']['osmolari']}}</div>
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control" id="osmolarv">{{$todoxxxx['calculos']['osmolarv']}}</div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-lg-6 table-bordered form-control">GRAMOS TOTALES DE NITRÓGENO</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="gramtota" style="text-align: right;">{{$todoxxxx['calculos']['gramtota']}}</div>
        <div class="col-xs-5 col-sm-5 col-lg-5  "></div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-lg-6 table-bordered form-control">RELACIÓN: Caloría No proteícas/g Nitrógeno</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="protnitr" style="text-align: right;">{{$todoxxxx['calculos']['protnitr']}}</div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-lg-6 table-bordered form-control">RELACIÓN: Caloría No proteícas/g A.A</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="proteica" style="text-align: right;">{{$todoxxxx['calculos']['proteica']}}</div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control">CALORÍAS PROTEICAS</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" style="text-align: right;">
            <div style="float: right;">%</div>
            <div id="caloprov" style="float: right;">{{$todoxxxx['calculos']['caloprov']}}</div>
        </div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="caloprot" style="text-align: right;">{{$todoxxxx['calculos']['caloprot']}}</div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control">CALORÍAS LÍPIDOS</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" style="text-align: right;">
            <div style="float: right;">%</div>
            <div id="calolipv" style="float: right;">{{$todoxxxx['calculos']['calolipv']}}</div>
        </div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="calolipi" style="text-align: right;">{{$todoxxxx['calculos']['calolipi']}}</div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control">CALORÍAS CARBOHIDRATOS</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" style="text-align: right;">
            <div style="float: right;">%</div>
            <div id="calocarv" style="float: right;">{{$todoxxxx['calculos']['calocarv']}}</div>
        </div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="calocarb" style="text-align: right;">{{$todoxxxx['calculos']['calocarb']}}</div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control">CALORÍAS TOTALES</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" style="text-align: right;">
            <div style="float: right;">%</div>
            <div id="calototv" style="float: right;">{{$todoxxxx['calculos']['calototv']}}</div>
        </div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="calotota" style="text-align: right;">{{$todoxxxx['calculos']['calotota']}}</div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-lg-6 table-bordered form-control">CALORÍAS TOTALES/Kg//Día</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="caltotkg" style="text-align: right;">{{$todoxxxx['calculos']['caltotkg']}}</div>
        <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-lg-6 table-bordered form-control">RELACIÓN CALCIO/FÓSFORO (< 2)</div>
                <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="calcfosf" style="text-align: right;">{{$todoxxxx['calculos']['calcfosf']}}</div>
                <div class="col-xs-5 col-sm-5 col-lg-5 table-bordered form-control" id="calcfosv">{{$todoxxxx['calculos']['calcfosv']}}</div>

                </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-lg-6 table-bordered form-control">PESO TEÓRICO</div>
            <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered form-control" id="pesoteor" style="text-align: right;">{{$todoxxxx['calculos']['pesoteor']}}</div>
            <div class="col-xs-5 col-sm-5 col-lg-5 "></div>
        </div>
