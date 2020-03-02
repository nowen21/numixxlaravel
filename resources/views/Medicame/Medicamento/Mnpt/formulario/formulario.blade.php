<div class="form-group row">
  <div class="form-group col-md-6">
    {{ Form::label('npt_id', 'Npt:', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
      {{ Form::select('npt_id', $todoxxxx['mnptxxxx'], $todoxxxx['modeloxx']->npt_id, ['class' => 'form-control-plaintext','id'=>'npt_id']) }}
    @else
      {{ Form::select('npt_id', $todoxxxx['mnptxxxx'], null, ['class' => $errors->first('npt_id') ? 'form-control is-invalid' : 'form-control','id'=>'npt_id']) }}
    @endif
    @if($errors->has('npt_id'))
    <div class="invalid-feedback d-block">
        {{ $errors->first('npt_id') }}
    </div>
    @endif
  </div>

  <div class="form-group col-md-6">
    {{ Form::label('randesde', 'Rango desde', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('randesde', $todoxxxx['modeloxx']->randesde, ['class' => 'form-control-plaintext']) }}
    @else
        {{ Form::text('randesde', null, ['class' => $errors->first('randesde') ? 'form-control  is-invalid' : 'form-control',
        'placeholder' => 'Rango desde', 'maxlength' => '4', "onkeypress"=>"return filterFloat(event,this);"]) }}
    @endif
    @if($errors->has('randesde'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('randesde') }}
    </div>
    @endif
  </div>

  <div class="form-group col-md-6">
    {{ Form::label('ranhasta', 'Rango hasta', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('ranhasta', $todoxxxx['modeloxx']->ranhasta, ['class' => 'form-control-plaintext']) }}
    @else
        {{ Form::text('ranhasta', null, ['class' => $errors->first('ranhasta') ? 'form-control  is-invalid' : 'form-control',
        'placeholder' => 'Rango hasta', 'maxlength' => '4', "onkeypress"=>"return filterFloat(event,this);"]) }}
    @endif
    @if($errors->has('ranhasta'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('ranhasta') }}
    </div>
    @endif
  </div>

  <div class="form-group col-md-6">
    {{ Form::label('rangunid', 'Rango unidad', ['class' => 'control-label col-form-label-sm']) }}
    @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('rangunid', $todoxxxx['modeloxx']->rangunid, ['class' => 'form-control-plaintext']) }}
    @else
        {{ Form::text('rangunid', null, ['class' => $errors->first('rangunid') ? 'form-control  is-invalid' : 'form-control',
        'placeholder' => 'Rango unidad', 'maxlength' => '120']) }}
    @endif
    @if($errors->has('rangunid'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('rangunid') }}
    </div>
    @endif
  </div>

  <div class="form-group col-md-12">
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
