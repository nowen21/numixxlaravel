<div class="form-group row">
    <div class="form-group col-md-12">
        {{ Form::label('proceso_id', 'Proceso:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::select('proceso_id', $todoxxxx['procesox'], $todoxxxx['modeloxx']->proceso_id, ['class' => 'form-control-plaintext','id'=>'proceso_id']) }}
        @else
        {{ Form::select('proceso_id', $todoxxxx['procesox'], null, ['class' => $errors->first('proceso_id') ? 
        'form-control is-invalid select2' : 'form-control select2','id'=>'proceso_id']) }}
        @endif
        @if($errors->has('proceso_id'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('proceso_id') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('','Datos completos correctos en la etiqueta') }}
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="completo" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->completo == 1) ? 'checked' : ''; ?> value="1">SI
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input {{$errors->first('completo') ? ' is-invalid' : ''}}" name="completo" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->completo == 2) ? 'checked' : ''; ?> value="2">NO
            </label>
        </div>
        @if($errors->has('completo'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('completo') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('','Ausencia de Partículas') }}
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="particul" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->particul == 1) ? 'checked' : ''; ?> value="1">SI
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input {{$errors->first('particul') ? ' is-invalid' : ''}}" name="particul" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->particul == 2) ? 'checked' : ''; ?> value="2">NO
            </label>
        </div>
        @if($errors->has('particul'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('particul') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('','Integridad de la bolsa o empaque primario') }}
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="integrid" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->integrid == 1) ? 'checked' : ''; ?> value="1">SI
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input {{$errors->first('integrid') ? ' is-invalid' : ''}}" name="integrid" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->integrid == 2) ? 'checked' : ''; ?> value="2">NO
            </label>
        </div>
        @if($errors->has('integrid'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('integrid') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('','Contenido/Volumen Completo') }}
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="contenid" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->contenid == 1) ? 'checked' : ''; ?> value="1">SI
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input {{$errors->first('contenid') ? ' is-invalid' : ''}}" name="contenid" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->contenid == 2) ? 'checked' : ''; ?> value="2">NO
            </label>
        </div>
        @if($errors->has('contenid'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('contenid') }}
        </div>
        @endif
    </div>

    <div class="form-group col-md-4">
        {{ Form::label('','Ausencia de Fugas') }}
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="fugasxxx" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->fugasxxx == 1) ? 'checked' : ''; ?> value="1">SI
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input {{$errors->first('fugasxxx') ? ' is-invalid' : ''}}" name="fugasxxx" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->fugasxxx == 2) ? 'checked' : ''; ?> value="2">NO
            </label>
        </div>
        @if($errors->has('fugasxxx'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('fugasxxx') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('','Ausencia de Miscelas/Integridad en Emulsión') }}
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="miscelas" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->miscelas == 1) ? 'checked' : ''; ?> value="1">SI
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input {{$errors->first('miscelas') ? ' is-invalid' : ''}}" name="miscelas" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->miscelas == 2) ? 'checked' : ''; ?> value="2">NO
            </label>
        </div>
        @if($errors->has('miscelas'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('miscelas') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('','Ausencia de burbujas') }}
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="burbujas" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->burbujas == 1) ? 'checked' : ''; ?> value="1">SI
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input {{$errors->first('burbujas') ? ' is-invalid' : ''}}" name="burbujas" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->burbujas == 2) ? 'checked' : ''; ?> value="2">NO
            </label>
        </div>
        @if($errors->has('burbujas'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('burbujas') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('','Documentación completa') }}
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="document" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->document == 1) ? 'checked' : ''; ?> value="1">SI
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input {{$errors->first('document') ? ' is-invalid' : ''}}" name="document" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->document == 2) ? 'checked' : ''; ?> value="2">NO
            </label>
        </div>
        @if($errors->has('document'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('document') }}
        </div>
        @endif
    </div>


    <div class="form-group col-md-4">
        {{ Form::label('teorico_', 'Peso teórico:', ['class' => 'control-label col-form-label-sm']) }}
        @if($todoxxxx['accionxx'] == 'Ver')
        {{ Form::text('teorico_', $todoxxxx['modeloxx']->teorico_, ['class' => 'form-control-plaintext','style'=>'height: 28px']) }}
        @else
        {{ Form::text('teorico_', null, ['class' => $errors->first('teorico_') ?
         'form-control  is-invalid calcularvolumen' : 'form-control calcularvolumen', 'placeholder' => 'Peso teórico', 'maxlength' => '120', 'style'=>'height: 28px']) }}
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
        {{ Form::label('','Peso dentro límites establecidos') }}
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="limitesx" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->limitesx == 1) ? 'checked' : ''; ?> value="1">SI
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input {{$errors->first('limitesx') ? ' is-invalid' : ''}}" name="limitesx" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->limitesx == 2) ? 'checked' : ''; ?> value="2">NO
            </label>
        </div>
        @if($errors->has('limitesx'))
        <div class="invalid-feedback d-block">
            {{ $errors->first('limitesx') }}
        </div>
        @endif
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('','Concepto') }}
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="concepto" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->concepto == 1) ? 'checked' : ''; ?> value="1">SI
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input {{$errors->first('concepto') ? ' is-invalid' : ''}}" name="concepto" <?php echo (isset($todoxxxx['modeloxx']) && $todoxxxx['modeloxx']->concepto == 2) ? 'checked' : ''; ?> value="2">NO
            </label>
        </div>
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