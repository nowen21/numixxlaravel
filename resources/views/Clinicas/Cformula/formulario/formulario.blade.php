<div class="form-group row">
    @include('layouts.registro')
    <div class="form-group col-md-12">
        {{ Form::label('sis_clinica_id', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('sis_clinica_id', $todoxxxx['clinicax'], $todoxxxx['modeloxx']->sis_clinica_id, ['class' => 'form-control-plaintext','id'=>'sis_clinica_id']) }}
        @else
        {{ Form::select('sis_clinica_id', $todoxxxx['clinicax'], null, ['class' => $errors->first('sis_clinica_id') ?
        'form-control is-invalid select2' : 'form-control select2','id'=>'sis_clinica_id','autocomplete'=>"off"]) }}
        @endif
        @if($errors->has('sis_clinica_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_clinica_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('tiempo', 'Tiempo Infusión (H) :', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('tiempo', $todoxxxx['modeloxx']->tiempo, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('tiempo', null, ['class' => $errors->first('tiempo') ?
         'form-control  is-invalid calcularvolumen' : 'form-control calcularvolumen',
         'placeholder' => 'Tiempo Infusión', 'maxlength' => '120','autocomplete'=>"off"]) }}
        @endif
        @if($errors->has('tiempo'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('tiempo') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('velocidad', 'Velocidad Infusión (ml/h):', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('velocidad', $todoxxxx['modeloxx']->velocidad, ['class' => 'form-control-plaintext',
        'style'=>'height: 28px']) }}
        @else
        {{ Form::text('velocidad', null, ['class' => $errors->first('velocidad') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Velocidad Infusión:',
         'maxlength' => '120', 'autofocus','readonly','autocomplete'=>"off"]) }}
        @endif
        @if($errors->has('velocidad'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('velocidad') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('volumen', 'Volumen Total (ml):', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('volumen', $todoxxxx['modeloxx']->volumen, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('volumen', null, ['class' => $errors->first('volumen') ?
         'form-control  is-invalid calcularvolumen calcularagua' : 'form-control calcularvolumen calcularagua',
         'onkeypress'=>'return filterFloat(event,this);',
         'placeholder' => 'Volumen Total', 'maxlength' => '120', 'autofocus','autocomplete'=>"off"]) }}
        @endif
        @if($errors->has('volumen'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('volumen') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('purga', 'Purga (ml):', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('purga', $todoxxxx['modeloxx']->purga, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('purga', null, ['class' => $errors->first('purga') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Purga', 'maxlength' => '120',
         'onkeypress'=>'return filterFloat(event,this);',
         'autofocus','autocomplete'=>"off"]) }}
        @endif
        @if($errors->has('purga'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('purga') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('peso', 'Peso (Kg):', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('peso', $todoxxxx['modeloxx']->peso, ['class' => 'form-control-plaintext']) }}
        @else
        {{ Form::text('peso', null, ['class' => $errors->first('peso') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Peso', 'maxlength' => '120',
         'autofocus','autocomplete'=>"off"]) }}
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
</div>
<h4>
    <div class="row table-bordered">
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered">MEDICAMENTO</div>
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered">SELECCIÓN</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered">UNIDAD</div>
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered">REQUERIMIENTO</div>
        <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered">VOLUMEN</div>

    </div>
</h4>
@foreach($todoxxxx['formular'] as $formulax)
<div class="row table table-bordered">
    <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered">
        {{$formulax['casaxxxx']}}
    </div>
    <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered">
        {{ Form::select($formulax['campo_id'], $formulax['selelist'], $formulax['selevalu'],
                        ['class'=>'form-control medicamento calcularagua select2bs4','id'=>$formulax['campo_id'],'style'=>'width: 100%;']) }}
    </div>
    <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered" id="{{$formulax['campo_id'].'_unid'}}">
        {{$formulax['unidmedi']}}
    </div>
    <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered">
        {{ Form::text($formulax['campo_id'].'_cant',
        $formulax['requerim'],

        ['class'=>'form-control input-number test calcularagua',
        'id'=>$formulax['campo_id'].'_cant',
        'placeholder'=>'Diario',
        'onkeypress'=>'return filterFloat(event,this);',
        'data-toggle'=>"popover",'autocomplete'=>"off",
        $formulax['readonly'],


        ]) }}
    </div>
    <div class="col-xs-1 col-sm-1 col-lg-1 table-bordered">
        {{ Form::text($formulax['campo_id'].'_volu',
        $formulax['volumenx'],
        ['class'=>'form-control input-number test calcularagua','style'=>'width: 100px',
        'id'=>$formulax['campo_id'].'_volu',
        'onkeypress'=>'return filterFloat(event,this);',
        $formulax['readonly'],'autocomplete'=>"off"

        ]) }}
    </div>
</div>
@endforeach

    @include('Clinicas.Cformula.formulario.resultax')

<div class="row">

    @include('layouts.registro')
</div>
