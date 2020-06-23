<div class="form-group row">
    <div class="form-group col-md-4">
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
    <div class="form-group col-md-4">
        {{ Form::label('tiempo', 'Tiempo Infusión:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('tiempo', $todoxxxx['modeloxx']->tiempo, ['class' => 'form-control-plaintext','style'=>'height: 28px']) }}
        @else
        {{ Form::text('tiempo', null, ['class' => $errors->first('tiempo') ?
         'form-control  is-invalid calcularvolumen' : 'form-control calcularvolumen',
         'placeholder' => 'Tiempo Infusión', 'maxlength' => '120', 'style'=>'height: 28px','autocomplete'=>"off"]) }}
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
        {{ Form::text('velocidad', null, ['class' => $errors->first('velocidad') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Velocidad Infusión:',
         'maxlength' => '120', 'autofocus','style'=>'height: 28px','readonly','autocomplete'=>"off"]) }}
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
        {{ Form::text('volumen', null, ['class' => $errors->first('volumen') ?
         'form-control  is-invalid calcularvolumen calcularagua' : 'form-control calcularvolumen calcularagua',
         'placeholder' => 'Volumen Total', 'maxlength' => '120', 'autofocus','style'=>'height: 28px','autocomplete'=>"off"]) }}
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
        {{ Form::text('purga', null, ['class' => $errors->first('purga') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Purga', 'maxlength' => '120',
         'autofocus','style'=>'height: 28px','autocomplete'=>"off"]) }}
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
        {{ Form::text('peso', null, ['class' => $errors->first('peso') ?
         'form-control  is-invalid' : 'form-control', 'placeholder' => 'Peso', 'maxlength' => '120',
         'autofocus','style'=>'height: 28px','autocomplete'=>"off"]) }}
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
    <div class="form-group col-md-12">
        <table class="table table-bordered" style="margin-top: 10px">
            <thead>
                <tr>
                    <th>MEDICAMENTO</th>
                    <th>SELECCIÓN</th>
                    <th>UNIDAD</th>
                    <th>REQUERIMIENTO</th>
                    <th>VOLUMEN</th>
                </tr>
            </thead>
            <tbody id="formulaciontable">

                @foreach($todoxxxx['formular'] as $formulax)
                <?php
                $idxxxxxx = '';
                $ocultarx = '';
                if ($formulax['campo_id'] == 'multiuno' && $todoxxxx['paciente']->npt_id == 3) {
                    $idxxxxxx = 'ocultarx';
                    $ocultarx = 'display: none';
                }

                ?>
                <tr id="{{$idxxxxxx}}" style="">
                    <td>{{$formulax['casaxxxx']}}</td>
                    <td>{{ Form::select($formulax['campo_id'], $formulax['selelist'], $formulax['selevalu'],['class'=>'form-control medicamento calcularagua select2','id'=>$formulax['campo_id']]) }}
                    </td>
                    <td id="{{$formulax['campo_id'].'_unid'}}">{{$formulax['unidmedi']}}</td>
                    <td> {{ Form::text($formulax['campo_id'].'_cant',
        $formulax['requerim'],

        ['class'=>'form-control input-number test calcularagua',
        'id'=>$formulax['campo_id'].'_cant',
        'placeholder'=>'Diario',
        'onkeypress'=>'return filterFloat(event,this);',
        'data-toggle'=>"popover",'autocomplete'=>"off",
        $formulax['readonly'],


        ]) }} </td>
                    <td>{{ Form::text($formulax['campo_id'].'_volu',
        $formulax['volumenx'],
        ['class'=>'form-control input-number test calcularagua','style'=>'width: 100px',
        'id'=>$formulax['campo_id'].'_volu',
        'onkeypress'=>'return filterFloat(event,this);',
        $formulax['readonly'],'autocomplete'=>"off"

        ]) }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @include('Clinicas.Cformula.formulario.resultad')

    </div>
</div>
