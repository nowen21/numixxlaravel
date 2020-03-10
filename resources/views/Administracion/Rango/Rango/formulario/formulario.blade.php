<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('ranginic', 'Rango Desde:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::number('ranginic', $todoxxxx['modeloxx']->ranginic, ['class' => 'form-control-plaintext',
        'style'=>'height: 28px']) }}
        @else
        {{ Form::number('ranginic', null, ['class' => $errors->first('ranginic') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Rango Desde', 
         'autofocus','style'=>'height: 28px','onkeypress'=>'return filterFloat(event,this);']) }}
        @endif
        @if($errors->has('ranginic'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('ranginic') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('rangfina', 'Rango Hasta:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::number('rangfina', $todoxxxx['modeloxx']->rangfina, ['class' => 'form-control-plaintext',
        'style'=>'height: 28px']) }}
        @else
        {{ Form::number('rangfina', null, ['class' => $errors->first('rangfina') ? 
        'form-control  is-invalid' : 'form-control', 'placeholder' => 'Rango Hasta',  'autofocus','style'=>'height: 28px'
        ,'onkeypress'=>'return filterFloat(event,this);', 
        ]) }}
        @endif
        @if($errors->has('rangfina'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('rangfina') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6" >
        {{ Form::label('codiword', 'Código Word Office:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
            {{ Form::text('codiword', $todoxxxx['modeloxx']->codiword, ['class' => 'form-control-plaintext','style'=>"height: 35px" ]) }}
        @else
            {{ Form::text('codiword', null, ['class' => $errors->first('codiword') ? 'form-control  is-invalid' : 'form-control', 
            'placeholder' => 'Código Word Office', 'maxlength' => '120', 'autofocus','style'=>"height: 28px"]) }}
        @endif
        @if($errors->has('codiword'))
            <div class="invalid-feedback d-block">
                {{ $errors->first('codiword') }}
        </div>
        @endif   
      </div>
    <div class="form-group col-md-6" >
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], $todoxxxx['modeloxx']->sis_esta_id, ['class' => 'form-control-plaintext','id'=>'sis_esta_id']) }}
        @else
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'sis_esta_id','style'=>'width: 100%']) }}
        @endif
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>