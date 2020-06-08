<div class="form-group row">
    <div class="form-group col-md-12">
        {{ Form::label('cformula_id', 'Formulación:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('cformula_id', $todoxxxx['procesox'], $todoxxxx['modeloxx']->cformula_id, ['class' => 'form-control-plaintext select2','id'=>'cformula_id']) }}
        @else
        {{ Form::select('cformula_id', $todoxxxx['procesox'], null, ['class' => $errors->first('cformula_id') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'cformula_id']) }}
        @endif
        @if($errors->has('cformula_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('cformula_id') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('completo', 'Datos completos correctos en la etiqueta:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('completo', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->completo, ['class' => 'form-control-plaintext','id'=>'completo']) }}
        @else
        {{ Form::select('completo', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('completo') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'completo']) }}
        @endif
        @if($errors->has('completo'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('completo') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('particul', 'Ausencia de Partículas:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('particul', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->particul, ['class' => 'form-control-plaintext','id'=>'particul']) }}
        @else
        {{ Form::select('particul', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('particul') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'particul']) }}
        @endif
        @if($errors->has('particul'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('particul') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('integrid', 'Integridad de la bolsa o empaque primario:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('integrid', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->integrid, ['class' => 'form-control-plaintext','id'=>'integrid']) }}
        @else
        {{ Form::select('integrid', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('integrid') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'integrid']) }}
        @endif
        @if($errors->has('integrid'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('integrid') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('contenid', 'Contenido/Volumen Completo:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('contenid', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->contenid, ['class' => 'form-control-plaintext','id'=>'contenid']) }}
        @else
        {{ Form::select('contenid', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('contenid') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'contenid']) }}
        @endif
        @if($errors->has('contenid'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('contenid') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('fugasxxx', 'Ausencia de Fugas:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('fugasxxx', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->fugasxxx, ['class' => 'form-control-plaintext','id'=>'fugasxxx']) }}
        @else
        {{ Form::select('fugasxxx', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('fugasxxx') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'fugasxxx']) }}
        @endif
        @if($errors->has('fugasxxx'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('fugasxxx') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('miscelas', 'Ausencia de Miscelas/Integridad en Emulsión:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('miscelas', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->miscelas, ['class' => 'form-control-plaintext','id'=>'miscelas']) }}
        @else
        {{ Form::select('miscelas', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('miscelas') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'miscelas']) }}
        @endif
        @if($errors->has('miscelas'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('miscelas') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('burbujas', 'Ausencia de burbujas:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('burbujas', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->burbujas, ['class' => 'form-control-plaintext','id'=>'burbujas']) }}
        @else
        {{ Form::select('burbujas', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('burbujas') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'burbujas']) }}
        @endif
        @if($errors->has('burbujas'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('burbujas') }}
        </div>
        @endif
    </div>
    
    <div class="form-group col-md-4">
        {{ Form::label('document', 'Documentación completa:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('document', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->document, ['class' => 'form-control-plaintext','id'=>'document']) }}
        @else
        {{ Form::select('document', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('document') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'document']) }}
        @endif
        @if($errors->has('document'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('document') }}
        </div>
        @endif
    </div>
    
    

    <div class="form-group col-md-4">
        {{ Form::label('teorico_', 'Peso teórico:') }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('teorico_', $todoxxxx['modeloxx']->teorico_, ['class' => 'form-control-plaintext','style'=>'height: 28px']) }}
        @else
        {{ Form::text('teorico_', $todoxxxx['pesoteor'], ['class' => $errors->first('teorico_') ?
         'form-control  is-invalid calcularvolumen' : 'form-control calcularvolumen', 'placeholder' => 'Peso teórico', 'maxlength' => '120', 'style'=>'height: 28px','readonly']) }}
        @endif
        @if($errors->has('teorico_'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('teorico_') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('realxxx_', 'Peso real:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('realxxx_', $todoxxxx['modeloxx']->realxxx_, ['class' => 'form-control-plaintext','style'=>'height: 28px']) }}
        @else
        {{ Form::text('realxxx_', null, ['class' => $errors->first('realxxx_') ?
         'form-control  is-invalid calcularvolumen' : 'form-control calcularvolumen', 'placeholder' => 'Peso real', 'maxlength' => '120', 'style'=>'height: 28px']) }}
        @endif
        @if($errors->has('realxxx_'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('realxxx_') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('limitesx', 'Peso dentro límites establecidos:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('limitesx', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->limitesx, ['class' => 'form-control-plaintext','id'=>'limitesx']) }}
        @else
        {{ Form::select('limitesx', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('limitesx') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'limitesx']) }}
        @endif
        @if($errors->has('limitesx'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('limitesx') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('concepto', 'Concepto:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('concepto', $todoxxxx['sinoxxxx'], $todoxxxx['modeloxx']->concepto, ['class' => 'form-control-plaintext','id'=>'concepto']) }}
        @else
        {{ Form::select('concepto', $todoxxxx['sinoxxxx'], null, ['class' => $errors->first('concepto') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'concepto']) }}
        @endif
        @if($errors->has('concepto'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('concepto') }}
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