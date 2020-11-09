<div class="form-group row">
    <div class="form-group col-md-6">
        {{ Form::label('orden_id', 'Orden:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('orden_id', $todoxxxx['rangoxxx'], null, ['class' => $errors->first('orden_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'orden_id']) }}
        @if($errors->has('orden_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('orden_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('clinica_id', 'Cínica:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('clinica_id', $todoxxxx['clinicai'], null, ['class' => $errors->first('clinica_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'sis_clinica_id']) }}
        @if($errors->has('clinica_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('clinica_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('sis_esta_id', 'Estado:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('sis_esta_id', $todoxxxx['estadoxx'], null, ['class' => $errors->first('sis_esta_id') ? 'form-control is-invalid select2' : 'form-control select2','id'=>'sis_esta_id']) }}
        @if($errors->has('sis_esta_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_esta_id') }}
        </div>
        @endif
    </div>
</div>
