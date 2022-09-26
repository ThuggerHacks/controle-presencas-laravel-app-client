<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;

Route::get('/departamento/home',[DepartamentoController::class,"index"])->name("dep.home");

Route::get('/departamento/subject',[DepartamentoController::class,"subject"])->name("dep.subject");

Route::get('/departamento/student', [DepartamentoController::class,"student"])->name("dep.student");

Route::get('/departamento/login',[DepartamentoController::class,"loginView"])->name("dep.login.view");

//mobile
Route::get('/departamento/workers',[DepartamentoController::class,"mobileView"])->name("dep.mobile.view")->middleware("auth.dep");

Route::get('/departamento/workers/{id?}',[DepartamentoController::class,"mobilePresence"])->name("dep.mobile.presence")->middleware("auth.dep");

Route::get('/departamento/timer/{id?}/{user_id?}',[DepartamentoController::class,"mobileTimer"])->name("dep.mobile.timer")->middleware("auth.dep");


Route::post('/departamento/search/{id?}',[DepartamentoController::class,"mobileSearch"])->name("dep.mobile.search")->middleware("auth.dep");

Route::put('/departamento/fingerprint/{id?}',[DepartamentoController::class,"mobileFingerPrint"])->name("dep.mobile.fingerprint")->middleware("auth.dep");
//end

Route::post("/departamento/login",[DepartamentoController::class,"login"])->name("dep.login");
