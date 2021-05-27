<style>
.altoxxxx{
    /* height: 35px; */
    font-size: 13px;
}

.negritax{
    font-weight: bold;
}

.textinpu{
    width: 100%;
    font-size: 12px;
    height: 15px;
}

.altoxxxx input[readonly] {
    background-color: transparent;
    border: 0;
    box-shadow: none;
}

.readonly input[readonly] {
    background-color: transparent;
    border: 0;
    box-shadow: none;
}

.select2-selection__rendered {
    line-height: 28px !important;
}
.select2-container .select2-selection--single {
    height: 30px !important;
}
.select2-selection__arrow {
    height: 5px !important;
}
</style>
<div class="form-group row">
    @include('layouts.registro')
    <div class="form-group col-md-12">
        {{ Form::label('sis_clinica_id', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::select('sis_clinica_id', $todoxxxx['clinicax'], null, ['class' => $errors->first('sis_clinica_id') ?
        'form-control form-control-sm is-invalid select2' : 'form-control select2','id'=>'sis_clinica_id','autocomplete'=>"off"]) }}
        @if($errors->has('sis_clinica_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('sis_clinica_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('tiempo', 'Tiempo Infusión (H) :', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('tiempo', null, ['class' => $errors->first('tiempo') ?
         'form-control form-control-sm is-invalid calcularvolumen' : 'form-control form-control-sm calcularvolumen',
         'placeholder' => 'Tiempo Infusión', 'maxlength' => '120','autocomplete'=>"off"]) }}
        @if($errors->has('tiempo'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('tiempo') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('velocidad', 'Velocidad Infusión (ml/h):', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('velocidad', null, ['class' => $errors->first('velocidad') ?
         'form-control form-control-sm is-invalid ' : 'form-control form-control-sm', 'placeholder' => 'Velocidad Infusión:',
         'maxlength' => '120', 'readonly',
         'style'=>'background-color: transparent; box-shadow: none;'
         ]) }}
        @if($errors->has('velocidad'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('velocidad') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('volumen', 'Volumen Total (ml):', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('volumen', null, ['class' => $errors->first('volumen') ?
         'form-control form-control-sm is-invalid calcularvolumen calcularagua' : 'form-control form-control-sm calcularvolumen calcularagua',
         'onkeypress'=>'return filterFloat(event,this);',
         'placeholder' => 'Volumen Total', 'maxlength' => '120', 'autofocus','autocomplete'=>"off"]) }}
        @if($errors->has('volumen'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('volumen') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('purga', 'Purga (ml):', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('purga', null, ['class' => $errors->first('purga') ?
         'form-control form-control-sm is-invalid' : 'form-control form-control-sm', 'placeholder' => 'Purga', 'maxlength' => '120',
         'onkeypress'=>'return filterFloat(event,this);',
         'autofocus','autocomplete'=>"off"]) }}
        @if($errors->has('purga'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('purga') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('peso', 'Peso (Kg):', ['class' => 'control-label col-form-label-sm']) }}
        {{ Form::text('peso', null, ['class' => $errors->first('peso') ?
         'form-control form-control-sm is-invalid' : 'form-control form-control-sm', 'placeholder' => 'Peso', 'maxlength' => '120',
         'autofocus','autocomplete'=>"off"]) }}
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

    <div class="row">
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered form-control form-control-sm">MEDICAMENTO</div>
        <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered form-control form-control-sm">SELECCIÓN</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control form-control-sm">UNIDAD</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control form-control-sm">REQUERIMIENTO</div>
        <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control form-control-sm">VOLUMEN</div>

    </div>

@foreach($todoxxxx['formular'] as $formulax)
<div class="row">
    <div class="col-xs-3 col-sm-3 col-lg-3 table-bordered form-control-sm">
        {{$formulax['casaxxxx']}}
    </div>
    <div class="col-xs-3 col-sm-3 col-lg-3">
        {{ Form::select($formulax['campo_id'], $formulax['selelist'], $formulax['selevalu'],
                        ['class'=>'form-control form-control-sm medicamento calcularagua select2bs4','id'=>$formulax['campo_id'],'style'=>'width: 100%;']) }}
    </div>
    <div class="col-xs-2 col-sm-2 col-lg-2 table-bordered form-control-sm" id="{{$formulax['campo_id'].'_unid'}}">
        {{$formulax['unidmedi']}}
    </div>
    <div class="col-xs-2 col-sm-2 col-lg-2">
        {{ Form::text($formulax['campo_id'].'_cant',
        $formulax['requerim'],

        ['class'=>'form-control form-control-sm input-number test calcularagua',
        'id'=>$formulax['campo_id'].'_cant',
        'placeholder'=>'Diario',
        'onkeypress'=>'return filterFloat(event,this);',
        'data-toggle'=>"popover",'autocomplete'=>"off",
        $formulax['readonly'],
        'style'=> $formulax['readonly']=='readonly'?'background-color: transparent; box-shadow: none; text-align: right;':'text-align: right;'

        ]) }}

        <input  type="hidden" id="{{$formulax['campo_id']}}_reto" name="{{$formulax['campo_id']}}_reto" placeholder="Requerimiento total" value="{{$formulax['requtota']}}">
    </div>
    <div class="col-xs-2 col-sm-2 col-lg-2">
        {{ Form::text($formulax['campo_id'].'_volu',
        $formulax['volumenx'],
        ['class'=>'form-control form-control-sm input-number test calcularagua','style'=>'width: 100%',
        'id'=>$formulax['campo_id'].'_volu',
        'onkeypress'=>'return filterFloat(event,this);',
        'style'=>$formulax['readonly']=='readonly'?'background-color: transparent; box-shadow: none; text-align: right;':'text-align: right;',
        $formulax['readonly'],'autocomplete'=>"off"

        ]) }}
        <input type="hidden" id="{{$formulax['campo_id']}}_vopu" name="{{$formulax['campo_id']}}_vopu" placeholder="Volumen purga" value="{{$formulax['volupurg']}}">
    </div>
</div>
@endforeach

    @include('Clinicas.Cformula.formulario.resultax')

<div class="row">

    @include('layouts.registro')
</div>
