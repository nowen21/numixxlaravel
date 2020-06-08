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
        {{ Form::label('ordene_id', 'OP:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('ordene_id', $todoxxxx['ordenxxx'], $todoxxxx['modeloxx']->ordene_id, ['class' => 'form-control-plaintext','id'=>'ordene_id']) }}
        @else
        {{ Form::select('ordene_id', $todoxxxx['ordenxxx'], null, ['class' => $errors->first('ordene_id') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'ordene_id']) }}
        @endif
        @if($errors->has('ordene_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('ordene_id') }}
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
                    <th>UND</th>
                    <th>LOTE</th>
                    <th>REGISTRO INVIMA</th>
                    <th>F VENC</th>
                    <th>MEDICAMENTO</th>
                    <th>UND</th>
                    <th>LOTE</th>
                    <th>REGISTRO INVIMA</th>
                    <th>F VENC</th>
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
                    <td scope="col" class="letras" style="width: 100px">
                        @if($alistami['medicamd']!='')
                        {{ Form::text($alistami['dispo_id'], $alistami['value_di'],
                            ['class'=>'form-control numerico','id'=>$alistami['dispo_id'],
                            'onkeypress'=>'return filterFloat(event,this);','style'=>'width: 80px']) }}
                        @endif
                    </td>
                    <td scope="col" class="letras">{{$alistami['lotexxxd']}}</td>
                    <td scope="col" class="letras">{{$alistami['reginvid']}}</td>
                    <td scope="col" class="letras">{{$alistami['fechvend']}}</td>
                    <td scope="col" class="letras">{{$alistami['medicamm']}}</td>
                    <td scope="col" class="letras">
                        @if($alistami['medicamm']!='')
                        {{ Form::text($alistami['medic_id'], $alistami['value_me'],
                            ['class'=>'form-control numerico','id'=>$alistami['medic_id'],
                            'onkeypress'=>'return filterFloat(event,this);','style'=>'width: 80px']) }}
                        @endif
                    </td>
                    <td scope="col" class="letras">{{$alistami['lotexxxm']}}</td>
                    <td scope="col" class="letras">{{$alistami['reginvim']}}</td>
                    <td scope="col" class="letras">{{$alistami['fechvenm']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>