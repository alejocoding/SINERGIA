<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('log.index');
});



// RUTAS DEL CONTROLADOR DEL  LOGIN

Route::view('/login', 'log.index')->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');


//RUTAS DE LOS PACIENTES

Route::resource('pacientes', PacienteController::class);

// RUTA AJAX

Route::get('/municipios/{departamento_id}', [PacienteController::class, 'AjaxMunicipios']);

