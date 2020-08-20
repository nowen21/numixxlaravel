<?php
$controll = 'Clinicas\Cremision';
$routexxx = 'cremision';
Route::group(['prefix' => 'rimisiones/{padrexxx}'], function () use ($routexxx, $controll) {
    Route::get('', [
        'uses' => $controll . 'Controller@index',
        'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
    ])->name($routexxx);

    Route::get('asignado', [
        'uses' => $controll . 'Controller@getAsignado',
        'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
    ])->name($routexxx . '.asignado');
    Route::get('asignar', [
        'uses' => $controll . 'Controller@getAsignar',
        'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
    ])->name($routexxx . '.asignar');
});
