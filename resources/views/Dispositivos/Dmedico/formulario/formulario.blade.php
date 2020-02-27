
  <div class="form-group row">
    
    <div class="form-group col-md-6">
      {{ Form::label('nombgene', 'Nombre Genérico:', ['class' => 'control-label col-form-label-sm']) }}
      @if($todoxxxx['accionxx'] == 'Ver')
          {{ Form::text('nombgene', $todoxxxx['modeloxx']->nombgene, ['class' => 'form-control-plaintext']) }}
      @else
          {{ Form::text('nombgene', null, ['class' => $errors->first('nombgene') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Nombre Genérico', 'maxlength' => '120', 'autofocus']) }}
      @endif
      @if($errors->has('nombgene'))
          <div class="invalid-feedback d-block">
              {{ $errors->first('nombgene') }}
      </div>
      @endif   
    </div>
    <div class="form-group col-md-6">
      {{ Form::label('concentr', 'Concentración:', ['class' => 'control-label col-form-label-sm']) }}
      @if($todoxxxx['accionxx'] == 'Ver')
          {{ Form::text('concentr', $todoxxxx['modeloxx']->concentr, ['class' => 'form-control-plaintext']) }}
      @else
          {{ Form::text('concentr', null, ['class' => $errors->first('concentr') ? 'form-control  is-invalid' : 'form-control', 
          'placeholder' => 'Concentración', 'maxlength' => '120', 'autofocus' ,'maxlength' => '5'
          ,'onkeypress'=>'return filterFloat(event,this);']) }}
      @endif
      @if($errors->has('concentr'))
          <div class="invalid-feedback d-block">
              {{ $errors->first('concentr') }}
      </div>
      @endif   
    </div>
    <div class="form-group col-md-6">
      {{ Form::label('unidmedi', 'Unidad de Medida:', ['class' => 'control-label col-form-label-sm']) }}
      @if($todoxxxx['accionxx'] == 'Ver')
          {{ Form::text('unidmedi', $todoxxxx['modeloxx']->unidmedi, ['class' => 'form-control-plaintext']) }}
      @else
          {{ Form::text('unidmedi', null, ['class' => $errors->first('unidmedi') ? 'form-control  is-invalid' : 'form-control', 'placeholder' => 'Unidad de Medida', 'maxlength' => '120', 'autofocus']) }}
      @endif
      @if($errors->has('unidmedi'))
          <div class="invalid-feedback d-block">
              {{ $errors->first('unidmedi') }}
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