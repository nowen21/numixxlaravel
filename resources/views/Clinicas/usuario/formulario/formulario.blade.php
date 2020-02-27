<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('clinica', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('clinica', $todoxxxx['modeloxx']->clinica, ['class' => 'form-control-plaintext','style'=>'height: 28px']) }}
        @else
        {{ Form::text('clinica', null, ['class' => $errors->first('clinica') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Clínica', 'maxlength' => '120', 'autofocus','style'=>'height: 28px']) }}
        @endif
        @if($errors->has('clinica'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('clinica') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('nitxxxxx', 'Nit:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::number('nitxxxxx', $todoxxxx['modeloxx']->nitxxxxx, ['class' => 'form-control-plaintext','style'=>'height: 28px']) }}
        @else
        {{ Form::number('nitxxxxx', null, ['class' => $errors->first('nitxxxxx') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Nit',  'autofocus','style'=>'height: 28px']) }}
        @endif
        @if($errors->has('nitxxxxx'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('nitxxxxx') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-2">
        {{ Form::label('digiveri', 'DV:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('digiveri', null, ['class' => 'form-control','style'=>'height: 28px','readonly'=>'readonly', 'placeholder' => 'DV']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('telefono', 'Teléfono:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::number('telefono', $todoxxxx['modeloxx']->telefono, ['class' => 'form-control-plaintext','style'=>'height: 28px','maxlength'=>"10"]) }}
        @else
        {{ Form::number('telefono', null, ['class' => $errors->first('telefono') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Teléfono',  'autofocus','style'=>'height: 28px']) }}
        @endif
        @if($errors->has('telefono'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('telefono') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], $todoxxxx['modeloxx']->sis_esta_id, ['class' => 'form-control-plaintext','id'=>'sis_esta_id']) }}
        @else
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ? 'form-control is-invalid' : 'form-control','id'=>'sis_esta_id']) }}
        @endif
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>