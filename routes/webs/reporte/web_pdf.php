<?php
$controll = 'Reporte\Pdf';
$routexxx = 'reporpdf';
Route::group(['prefix' => 'pdfs'], function () use ($controll, $routexxx) {
    Route::get('etiquetanpt/{padrexxx}', [
        'uses' => $controll . 'Controller@imprimirEtiquetaNpt',
    ])->name($routexxx.'.etiquetanpt');
});
