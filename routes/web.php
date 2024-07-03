<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\imcController;
use App\Http\Controllers\NotasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/imc', [imcController::class,'index']);

Route::get('/notas', [NotasController::class,'notas']);

Route::get('/imc/calcular', [imcController::class,'calcular'])->name('imc.calcular');

Route::post('/imc/store',[imcController::class,'store'])->name('imc.store');

Route::get('/imc/show',[imcController::class,'show']);

Route::delete('/imc/delete/{id}', [imcController::class,'destroy'])->name('imc.delete');

Route::put('/imc/update/{id}', [imcController::class,'update'])->name('imc.update');