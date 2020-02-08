<div class="form-group">
  {{ Form::label('formulacione_id','Lote') }} 
  @if($dataxxxx['update'])
  {{ Form::select('formulacione_id',$dataxxxx['lotesxxx'], null,['class'=>'form-control']) }} 
  @else
  {{ Form::text('formulacione_id', null,['class'=>'form-control','readonly']) }} 
  @endif
</div>
<div class="form-group">
  {{ Form::label('','Coloración Normal') }} 

  <div class="radio">
    <label><input type="radio" name="coloraci" <?php echo (isset($dataxxxx['proceso']) && $dataxxxx['proceso']->coloraci == 1) ? 'checked' : ''; ?>  value="1">SI</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="coloraci" <?php echo (isset($dataxxxx['proceso']) && $dataxxxx['proceso']->coloraci == 2) ? 'checked' : ''; ?> value="2">NO</label>
  </div>
</div>
<div class="form-group">
  {{ Form::label('','Ausencia de Partículas') }} 

  <div class="radio">
    <label><input type="radio" name="ausepart" value="1" <?php echo (isset($dataxxxx['proceso']) && $dataxxxx['proceso']->ausepart == 1) ? 'checked' : ''; ?>>SI</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="ausepart" value="2" <?php echo (isset($dataxxxx['proceso']) && $dataxxxx['proceso']->ausepart == 2) ? 'checked' : ''; ?>>NO</label>
  </div>
</div>
<div class="form-group">
  {{ Form::label('ausefuga','Ausencia de Fugas') }} 
  <div class="radio">
    <label><input type="radio" name="ausefuga" value="1" <?php echo (isset($dataxxxx['proceso']) && $dataxxxx['proceso']->ausefuga == 1) ? 'checked' : ''; ?>>SI</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="ausefuga" value="2" <?php echo (isset($dataxxxx['proceso']) && $dataxxxx['proceso']->ausefuga == 2) ? 'checked' : ''; ?>>NO</label>
  </div>
</div>
<div class="form-group">
  {{ Form::label('ausemise','Ausencia de Miscelas/Integridad en Emulsión') }} 
  <div class="radio">
    <label><input type="radio" name="ausemise" value="1" <?php echo (isset($dataxxxx['proceso']) && $dataxxxx['proceso']->ausemise == 1) ? 'checked' : ''; ?>>SI</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="ausemise" value="2" <?php echo (isset($dataxxxx['proceso']) && $dataxxxx['proceso']->ausemise == 2) ? 'checked' : ''; ?>>NO</label>
  </div>
</div>
<div class="form-group"> 
  {{ Form::label('estado_id','Estado') }} 
  <div class="radio">
    {{ Form::select('estado_id',$dataxxxx['estadosx'], null,['class'=>'form-control']) }} 
  </div>
</div>
<div class="form-group">
  {{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }} 
  @if(isset($update))
  <a href="{{route('procesos.create')}}" class="btn btn-sm btn-primary pull-right" role="button">Nuevo Proceso</a>  
  @endif
  <a href="{{route('procesos.index')}}" class="btn btn-sm btn-primary pull-right" role="button">Volver a Procesos</a>
</div>
