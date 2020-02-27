<style>
    /* Tooltip */
    .test + .tooltip > .tooltip-inner {
      background-color: #3C8DBC; 
      color: #FFFFFF; 
      border: 1px solid black; 
      padding: 15px;
      font-size: 15px;
    }
    /* Tooltip on top */
    .test + .tooltip.top > .tooltip-arrow {
      border-top: 5px solid black;
    }
    /* Tooltip on bottom */
    .test + .tooltip.bottom > .tooltip-arrow {
      border-bottom: 5px solid blue;
    }
    /* Tooltip on left */
    .test + .tooltip.left > .tooltip-arrow {
      border-left: 5px solid red;
    }
    /* Tooltip on right */
    .test + .tooltip.right > .tooltip-arrow {
      border-right: 5px solid black;
    }
  </style>

  <div class="form-group row">
    <div class="form-group col-md-4">
      {{ Form::label('sis_clinica_id', 'Clínica:', ['class' => 'control-label col-form-label-sm']) }}
      @if($todoxxxx['accionxx'] == 'Ver')
      {{ Form::select('sis_clinica_id', $todoxxxx['clinicax'], $todoxxxx['modeloxx']->sis_clinica_id, ['class' => 'form-control-plaintext','id'=>'sis_clinica_id']) }}
      @else
      {{ Form::select('sis_clinica_id', $todoxxxx['clinicax'], null, ['class' => $errors->first('sis_clinica_id') ? 'form-control is-invalid test' : 'form-control  test','id'=>'sis_clinica_id',
      ]) }}
      @endif
      @if($errors->has('sis_clinica_id'))
      <div class="invalid-feedback d-block">
          {{ $errors->first('sis_clinica_id') }}
      </div>
      @endif
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('casa_id', 'Casa:', ['class' => 'control-label col-form-label-sm']) }}
      @if($todoxxxx['accionxx'] == 'Ver')
      {{ Form::select('casa_id', $todoxxxx['casasxx'], $todoxxxx['modeloxx']->casa_id, ['class' => 'form-control-plaintext','id'=>'casa_id']) }}
      @else
      {{ Form::select('casa_id', $todoxxxx['casasxx'], null, ['class' => $errors->first('casa_id') ? 'form-control is-invalid test' : 'form-control test','id'=>'casa_id',
      ]) }}
      @endif
      @if($errors->has('casa_id'))
      <div class="invalid-feedback d-block">
          {{ $errors->first('casa_id') }}
      </div>
      @endif
    </div>
    <div class="form-group col-md-4">
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
    <div class="form-group col-md-4">
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
    <div class="form-group col-md-4">
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
    <div class="form-group col-md-4">
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
    <h3>NPTs:</h3>
    <div class="form-group col-md-12"> 
      @foreach($todoxxxx['nptsxxxx'] as $nptxxxxx)
        <label class="checkbox-inline">
          {{Form::checkbox('npts[]',$nptxxxxx->id,null)}}
          {{$nptxxxxx->nombre}}
        </label>
      @endforeach
    </div>
</div>