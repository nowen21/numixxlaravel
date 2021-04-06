<?php
$routexxx='infopaci';
$controll='Reportes\Excelxxx\InformePaciente';
Route::group(['prefix' => 'infopaci'], function () use($routexxx,$controll){
    Route::get('', [
		'uses' => $controll.'Controller@create',
		'middleware' => ['permission:'.$routexxx.'-leerxxxx|']
    ])->name($routexxx);

    Route::post('nuevo', [
		'uses' => $controll.'Controller@store',
		'middleware' => ['permission:'.$routexxx.'-imprimir']
	])->name($routexxx.'.crear');
});
