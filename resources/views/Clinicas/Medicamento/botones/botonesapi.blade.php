<?php 
$clasexxx='danger';
$textoxxx='Inactivar';
if($sis_esta_id==2){
    $clasexxx='success';
    $textoxxx='Activar';
}
?>

<a class="btn btn-sm btn-{{$clasexxx}} estadoxx" href="javascript:void(0)" id="{{$id}}">{{$textoxxx}}</a>
