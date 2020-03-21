<?php

$controll = 'Usuario\Urol';
$routexxx = 'uroles';
Route::group(['prefix' => 'uroles'], function () use ($controll, $routexxx) {

	Route::get('roles', [
		'uses' => $controll . 'Controller@index',
		'middleware' => ['permission:' . $routexxx . '-leer|' . $routexxx . '-crear|' . $routexxx . '-editar|' . $routexxx . '-borrar']
	])->name($routexxx);

});





