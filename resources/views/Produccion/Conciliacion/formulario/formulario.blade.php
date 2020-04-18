<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('producto', 'Producto:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('producto', $todoxxxx['modeloxx']->producto, 
            ['class' => 'form-control-plaintext','style'=>'height: 28px','readonly'=>'readonly']) }}
        @else
        {{ Form::text('producto', 'NUTRICIÓN PARENTERAL', ['class' => $errors->first('producto') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Producto', 
         'maxlength' => '120', 'style'=>'height: 28px','readonly'=>'readonly']) }}
        @endif
        @if($errors->has('producto'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('producto') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('created_at', 'Registro:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('created_at', $todoxxxx['modeloxx']->created_at, 
            ['class' => 'form-control-plaintext','style'=>'height: 28px','readonly'=>'readonly']) }}
        @else
        {{ Form::text('created_at', null, ['class' => $errors->first('created_at') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Registro', 'maxlength' => '120', 
         'autofocus','style'=>'height: 28px','readonly'=>'readonly']) }}
        @endif
        @if($errors->has('created_at'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('created_at') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('ordepres', 'OP:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('ordepres', $todoxxxx['modeloxx']->ordepres, 
            ['class' => 'form-control-plaintext','style'=>'height: 28px','readonly'=>'readonly']) }}
        @else
        {{ Form::text('ordepres', null, ['class' => $errors->first('ordepres') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'OP', 'maxlength' => '120', 
         'autofocus','style'=>'height: 28px','readonly'=>'readonly']) }}
        @endif
        @if($errors->has('ordepres'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('ordepres') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], $todoxxxx['modeloxx']->sis_esta_id, ['class' => 'form-control-plaintext','id'=>'sis_esta_id']) }}
        @else
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'sis_esta_id']) }}
        @endif
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-12">
        <hr style="border:  #000000 solid 2px" />
    </div>
    <div class="form-group col-md-12">
        <table class="table table-bordered table-responsiv" style="margin-top: 10px">
            <thead>
                <tr>
                    <th>DISPOSITIVO MÉDICO</th>
                    <th>LOTE</th>
                    <th>CANTIDAD CONSUMIDA</th>
                    <th>CANTIDAD ALISTADA</th>
                    <th>CANTIDAD SOBRANTE</th>
                    <th>MEDICAMENTO</th>
                    <th>LOTE</th>
                    <th>CANTIDAD CONSUMIDA</th>
                    <th>CANTIDAD ALISTADA</th>
                    <th>CANTIDAD SOBRANTE</th>
                </tr>
            </thead>
            <tbody id="formulaciontable">
                <style>
                    .letras {
                        font-size: 10px;
                    }
                </style>
                @foreach($todoxxxx['alistami'] as $alistami)
                <tr>
                    <td scope="col" class="letras">{{$alistami['medicamd']}}</td>
                    <td scope="col" class="letras">{{$alistami['lotexxxd']}}</td>


                    <td scope="col" class="letras">
                        {{ Form::text($alistami['dispo_id'].'_con', $alistami['value_di'],
                            ['class'=>'form-control numerico','id'=>$alistami['dispo_id'].'_con',
                            'onkeypress'=>'return filterFloat(event,this);','style'=>'width: 80px']) }}

                    </td>
                    <td scope="col" class="letras" style="width: 100px">
                        <div class="form-control" id="{{$alistami['dispo_id']}}">
                            {{$alistami['value_di']}}
                        </div>
                    </td>
                    <td scope="col" class="letras">
                        <div class="form-control" id="{{$alistami['dispo_id']}}_dif">
                            {{$alistami['value_di']}}
                        </div>
                    </td>
                    <td scope="col" class="letras">{{$alistami['medicamm']}}</td>
                    <td scope="col" class="letras">{{$alistami['lotexxxm']}}</td>


                    <td scope="col" class="letras">
                    <div class="form-control" id="{{$alistami['medic_id']}}_con">
                            {{$alistami['value_me']}}
                        </div>
                    </td>
                    <td scope="col" class="letras" style="width: 100px">
                        <div class="form-control" id="{{$alistami['medic_id']}}">
                            {{$alistami['value_me']}}
                        </div>
                    </td>
                    <td scope="col" class="letras">
                    {{ Form::text($alistami['medic_id'].'_dif', $alistami['value_me'],
                            ['class'=>'form-control numerico','id'=>$alistami['medic_id'].'_dif',
                            'onkeypress'=>'return filterFloat(event,this);','style'=>'width: 80px']) }}
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>