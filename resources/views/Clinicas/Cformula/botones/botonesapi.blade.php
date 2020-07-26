@if($requestx->editarxx)
<a class="btn btn-sm btn-primary" href="{{ route('formular.editar', [$queryxxx->sis_clinica_id,$queryxxx->paciente_id,$queryxxx->id]) }}">Editar</a>
@endif
@if($requestx->leerxxxx)
<a class="btn btn-sm btn-primary" href="{{ route('formular.ver', [$queryxxx->sis_clinica_id,$queryxxx->paciente_id,$queryxxx->id]) }}">Ver</a>
@endif
@if($requestx->copiarxx)
<a class="btn btn-sm btn-primary" href="{{ route('formular.copiar', [$queryxxx->sis_clinica_id,$queryxxx->paciente_id,$queryxxx->id]) }}">Copiar Formulación</a>
@endif
