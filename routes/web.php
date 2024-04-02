<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioContactoController;

Route::get('/', function () {
    return view('formulario_contacto');
});

Route::post('/enviar-formulario', [FormularioContactoController::class, 'enviar'])->name('formulario.enviar');

