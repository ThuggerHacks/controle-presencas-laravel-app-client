<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobileController;


//mobile
Route::get('/departamento/workers',[MobileController::class,"mobileView"])->name("dep.mobile.view")->middleware("auth.dep");

Route::get('/departamento/workers/{id?}',[MobileController::class,"mobilePresence"])->name("dep.mobile.presence")->middleware("auth.dep");

Route::get('/departamento/timer/{id?}/{user_id?}',[MobileController::class,"mobileTimer"])->name("dep.mobile.timer")->middleware("auth.dep");


Route::post('/departamento/search/{id?}',[MobileController::class,"mobileSearch"])->name("dep.mobile.search")->middleware("auth.dep");

Route::put('/departamento/fingerprint/{id?}',[MobileController::class,"mobileFingerPrint"])->name("dep.mobile.fingerprint")->middleware("auth.dep");
//end
