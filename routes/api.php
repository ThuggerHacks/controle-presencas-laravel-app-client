<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresencaFuncionarioController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/docente/login",[LoginController::class,"index"]);
Route::post("/docente/presences/search",[PresencaFuncionarioController::class,"search"]);
Route::get("/docente/presences/{id?}",[PresencaFuncionarioController::class,"index"]);
Route::post("/docente/sign",[PresencaFuncionarioController::class,"sign"])->middleware("isProxy");
Route::post('/work/{id?}',[PresencaFuncionarioController::class,"updateWorkTime"])->middleware("isProxy");
Route::put('/fingerprint/reset/{id?}',[PresencaFuncionarioController::class,"resetFingerPrint"]);
Route::put('/fingerprint/{id?}',[PresencaFuncionarioController::class,"setFingerPrint"]);