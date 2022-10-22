<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;

Route::middleware('dep.auth')->group(function () {

    Route::get('/departamento/home',[DepartamentoController::class,"index"])->name("dep.home");

    Route::get('/departamento/subject/{cadeira?}/{ano?}',[DepartamentoController::class,"subject"])->name("dep.subject");

    Route::get('/departamento/student/{id_disciplina?}/{id_aula?}', [DepartamentoController::class,"check"])->name("dep.student");

    Route::get("/subjects/{id?}",[DepartamentoController::class,"subjectByCourse"]);

    Route::post("dep/search/teacher",[DepartamentoController::class,"searchTeacherSubject"])->name("search.dep.all");

    Route::post("/addtimetable",[DepartamentoController::class,"addTimeTable"]);

    Route::post("/explain",[DepartamentoController::class,"addPresence"]);

    Route::post("/dep/addpresence",[DepartamentoController::class,"addPresenceStudent"]);

    Route::post('/departamento/seach/subject',[DepartamentoController::class,"subjectSearch"])->name("dep.subject.search");

});
