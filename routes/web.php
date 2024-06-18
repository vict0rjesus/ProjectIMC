<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imcController;
use App\Http\Controllers\NotasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/imc', [imcController::class,'index']);

Route::get('/notas', [NotasController::class,'notas']);

Route::post('/imc/calcular', [imcController::class,'calcular']);