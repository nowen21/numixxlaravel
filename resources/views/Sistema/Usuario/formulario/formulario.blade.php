<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('sis_clinica_id', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('sis_clinica_id', $todoxxxx['clinicid'], $todoxxxx['modeloxx']->sis_clinica_id, ['class' => 'form-control-plaintext','id'=>'sis_clinica_id']) }}
        @else
        {{ Form::select('sis_clinica_id', $todoxxxx['clinicid'], null, ['class' => $errors->first('sis_clinica_id') ? 
    'form-control is-invalid select2' : 'form-control select2','id'=>'sis_clinica_id']) }}
        @endif
        @if($errors->has('sis_clinica_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_clinica_id') }}
        </div>
        @endif
    </div>


    <div class="form-group col-md-6">
        {{ Form::label('name', 'Nombres:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('name', $todoxxxx['modeloxx']->name, ['class' => 'form-control-plaintext','style'=>'height: 28px']) }}
        @else
        {{ Form::text('name', null, ['class' => $errors->first('name') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Nombres', 'maxlength' => '120', 'autofocus','style'=>'height: 28px']) }}
        @endif
        @if($errors->has('name'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('email', 'E-mail:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('email', $todoxxxx['modeloxx']->email, ['class' => 'form-control-plaintext','style'=>'height: 28px']) }}
        @else
        {{ Form::text('email', null, ['class' => $errors->first('email') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'E-mail', 'maxlength' => '120', 'autofocus','style'=>'height: 28px']) }}
        @endif
        @if($errors->has('email'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('email') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('password', 'Contraseña:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::password('password',  ['class' => 'form-control-plaintext','style'=>'height: 28px']) }}
        @else
        {{ Form::password('password', ['class' => $errors->first('password') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Contraseña', 'maxlength' => '120', 'autofocus','style'=>'height: 28px']) }}
        @endif
        @if($errors->has('password'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('password') }}
        </div>
        @endif
    </div>



    <div class="form-group col-md-12">
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
</div>
