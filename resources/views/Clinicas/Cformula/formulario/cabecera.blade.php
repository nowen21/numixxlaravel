    <div class="form-group col-md-4">
        {{ Form::label('sis_clinica_id', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('sis_clinica_id', $todoxxxx['clinicax'], $todoxxxx['modeloxx']->sis_clinica_id, ['class' => 'form-control-plaintext','id'=>'sis_clinica_id']) }}
        @else
        {{ Form::select('sis_clinica_id', $todoxxxx['clinicax'], null, ['class' => $errors->first('sis_clinica_id') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'sis_clinica_id']) }}
        @endif
        @if($errors->has('sis_clinica_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_clinica_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('tiempo', 'Tiempo Infusión:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('tiempo', $todoxxxx['modeloxx']->tiempo, ['class' => 'form-control-plaintext','style'=>'height: 28px']) }}
        @else
        {{ Form::text('tiempo', 24, ['class' => $errors->first('tiempo') ?
         'form-control  is-invalid calcularvolumen' : 'form-control calcularvolumen', 'placeholder' => 'Tiempo Infusión', 'maxlength' => '120', 'style'=>'height: 28px']) }}
        @endif
        @if($errors->has('tiempo'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('tiempo') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('velocidad', 'Velocidad Infusión:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('velocidad', $todoxxxx['modeloxx']->velocidad, ['class' => 'form-control-plaintext',
        'style'=>'height: 28px']) }}
        @else
        {{ Form::text('velocidad', 64.7, ['class' => $errors->first('velocidad') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Velocidad Infusión:', 
         'maxlength' => '120', 'autofocus','style'=>'height: 28px','readonly']) }}
        @endif
        @if($errors->has('velocidad'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('velocidad') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('volumen', 'Volumen Total:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('volumen', $todoxxxx['modeloxx']->volumen, ['class' => 'form-control-plaintext','style'=>'height: 28px']) }}
        @else
        {{ Form::text('volumen', 1553, ['class' => $errors->first('volumen') ?
         'form-control  is-invalid calcularvolumen' : 'form-control calcularvolumen', 'placeholder' => 'Volumen Total', 'maxlength' => '120', 'autofocus','style'=>'height: 28px']) }}
        @endif
        @if($errors->has('volumen'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('volumen') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('purga', 'Purga:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('purga', $todoxxxx['modeloxx']->purga, ['class' => 'form-control-plaintext','style'=>'height: 28px']) }}
        @else
        {{ Form::text('purga', 30, ['class' => $errors->first('purga') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Purga', 'maxlength' => '120', 'autofocus','style'=>'height: 28px']) }}
        @endif
        @if($errors->has('purga'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('purga') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('peso', 'Peso:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('peso', $todoxxxx['modeloxx']->peso, ['class' => 'form-control-plaintext','style'=>'height: 28px']) }}
        @else
        {{ Form::text('peso', 68, ['class' => $errors->first('peso') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Peso', 'maxlength' => '120', 'autofocus','style'=>'height: 28px']) }}
        @endif
        @if($errors->has('peso'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('peso') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-12">
        <hr style="border:  #000000 solid 2px" />
    </div>
    